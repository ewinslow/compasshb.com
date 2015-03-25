<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use CompassHB\Www\Sermon;
use CompassHB\Www\Fellowship;
use CompassHB\Vimeo\VimeoVideo;
use CompassHB\Www\Http\Requests\FellowshipRequest;

class FellowshipsController extends Controller
{
    private $videoClient;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update', 'create', 'store', 'destroy']]);
        $this->videoClient = new VimeoVideo();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $fellowships = Fellowship::all()->toArray();
        $days = array_unique(array_column($fellowships, 'day'));

        $sermon = Sermon::latest('published_at')->published()->take(1)->get()->first();
        $sermon->iframe = $this->videoClient->oembed($sermon->video);

        return view('fellowships.index', compact('fellowships', 'days', 'sermon'))
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
        return view('fellowships.edit', compact('fellowship'));
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
        return view('fellowships.create');
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
}
