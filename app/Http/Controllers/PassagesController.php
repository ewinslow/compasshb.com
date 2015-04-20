<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use Redirect;
use CompassHB\Esv\Esv;
use CompassHB\Www\Passage;
use CompassHB\Google\Analytics;
use CompassHB\Www\Http\Requests\PassageRequest;

class PassagesController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update', 'create', 'store', 'destroy']]);
    }

    /**
     * Show all passages.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $esv = new Esv();

        $passages = Passage::latest('published_at')->published()->take(5)->get();
        $passage = $passages->first();
        $passage->verses = $esv->getScripture($passage->title);

        $postflash = '';

        if (date('D') == "Sun" || date('D') == "Sat") {
            $postflash = '<div class="alert alert-info" role="alert">Scripture of the Day is posted Monday through Friday.</div>';
        }

        $a = new Analytics();
        $analytics = $a->getPageViews('/read', 'today', 'today');
        $analytics['activeUsers'] = $a->getActiveUsers();

        return view('dashboard.passages.index', compact('passages', 'passage', 'postflash', 'analytics'))
            ->with('title', 'Scripture of the Day');
    }

    /**
     * Show a single passage.
     *
     * @param Passage $passage
     *
     * @return \Illuminate\View\View
     */
    public function show(Passage $passage)
    {
        $passages = Passage::latest('published_at')->published()->take(5)->get();

        $a = new Analytics();
        $analytics = $a->getPageViews('/read', $passage->published_at->format('Y-m-d'), $passage->published_at->format('Y-m-d'));
        $analytics['activeUsers'] = $a->getActiveUsers();

        $esv = new Esv();
        $passage->verses = $esv->getScripture($passage->title);

        $postflash = '<div class="alert alert-info" role="alert"><strong>New Post!</strong> You are reading an old post. For today\'s, <a href="/read">click here.</a></div>';

        if ($passage->published_at->isToday()) {
            $postflash = '';
        }

        return view('dashboard.passages.show', compact('passage', 'passages', 'postflash', 'analytics'))
            ->with('title', $passage->title);
    }

    /**
     * Edit an existing passage.
     *
     * @param Passage $passage
     *
     * @return \Illuminate\View\View
     */
    public function edit(Passage $passage)
    {
        return view('admin.passages.edit', compact('passage'));
    }

    /**
     * Update a passage.
     *
     * @param Passage        $passage
     * @param PassageRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Passage $passage, PassageRequest $request)
    {
        $passage->update($request->all());

        return redirect()
            ->route('admin.read')
            ->with('message', 'Success! Your Scripture of the Day was saved.');
    }

    /**
     * Show the page to create a new passage.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.passages.create');
    }

    /**
     * Store a new passage.
     *
     * @param PassageRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PassageRequest $request)
    {
        $passage = new Passage($request->all());

        Auth::user()->passages()->save($passage);

        return redirect()
            ->route('admin.read')
            ->with('message', 'Success! Your Scripture of the Day was saved.');
    }
}
