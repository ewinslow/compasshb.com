<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use CompassHB\Www\Sermon;
use CompassHB\Www\Fellowship;
use CompassHB\Www\Http\Requests\FellowshipRequest;
use CompassHB\Www\Repositories\Video\VideoRepository;
use CompassHB\Www\Repositories\Event\EventRepository;

class FellowshipsController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update', 'create', 'store', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(VideoRepository $video, EventRepository $event)
    {
        $fellowships = Fellowship::all()->toArray();
        $days = array_unique(array_column($fellowships, 'day'));

        $sermon = Sermon::where('ministry', '=', null)->latest('published_at')->published()->take(1)->get()->first();

        $video->setUrl($sermon->video);
        $sermon->iframe = $video->getEmbedCode();

        $e = $event->events();
        $hfg = [];

        $events = array_filter($e, function ($var) {
                // Filter out Home Fellowship Group events
                return ($var->organizer->id == '8215662871');
            });

        // Remove duplicates
        foreach ($events as $item) {
            if (isset($item->series_id)) {
                $hfg[$item->series_id] = $item;
            }
        }

        return view('dashboard.fellowships.index', compact('fellowships', 'days', 'sermon', 'hfg'))
            ->with('title', 'Home Fellowship Groups');
    }

    /**
     * Edit an existing fellowship.
     *
     * @param Fellowship $fellowship
     *
     * @return \Illuminate\View\View
     */
    public function edit(Fellowship $fellowship)
    {
        return view('admin.fellowships.edit', compact('fellowship'));
    }

    /**
     * Update a fellowship.
     *
     * @param Fellowship        $fellowship
     * @param FellowshipRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Fellowship $fellowship, FellowshipRequest $request)
    {
        $fellowship->update($request->all());

        return redirect()
            ->route('admin.fellowship')
            ->with('message', 'Success! Your home fellowship group was saved.');
    }

    /**
     * Show the page to create a new fellowship.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.fellowships.create');
    }

    /**
     * Store a new fellowship.
     *
     * @param FellowshipRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FellowshipRequest $request)
    {
        $fellowship = new Fellowship($request->all());

        Auth::user()->fellowships()->save($fellowship);

        return redirect()
            ->route('admin.fellowship')
            ->with('message', 'Success! Your home fellowship group was saved.');
    }

    public function show(EventRepository $event, $id)
    {
        $event = $event->event($id);

        return view('dashboard.fellowships.show', compact('event'));
    }
}
