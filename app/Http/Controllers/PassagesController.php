<?php

namespace CompassHB\Www\Http\Controllers;

use Auth;
use Redirect;
use CompassHB\Www\Passage;
use CompassHB\Www\Http\Requests\PassageRequest;
use CompassHB\Www\Repositories\Analytics\AnalyticRepository;
use CompassHB\Www\Repositories\Scripture\ScriptureRepository;

class PassagesController extends Controller
{
    /**
     * Create a new controller instance.
     */
    protected $analytics;
    protected $scripture;

    public function __construct(AnalyticRepository $analytics, ScriptureRepository $scripture)
    {
        $this->analytics = $analytics;
        $this->scripture = $scripture;
        $this->middleware('auth', ['only' => ['edit', 'update', 'create', 'store', 'destroy']]);
    }

    /**
     * Show all passages.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $passages = Passage::latest('published_at')->published()->take(5)->get();
        $passage = $passages->first();
        $passage->verses = $this->scripture->getScripture($passage->title);
        $passage->audio = $this->scripture->getAudioScripture($passage->title);

        $postflash = '';

        if (date('D') == 'Sun' || date('D') == 'Sat') {
            $postflash = '<div class="alert alert-info" role="alert">Scripture of the Day is posted Monday through Friday.</div>';
        }

        $analytics = $this->analytics->getPageViews('/read', 'today', 'today');
        $analytics['activeUsers'] = $this->analytics->getActiveUsers();

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

        $analytics = $this->analytics->getPageViews('/read', $passage->published_at->format('Y-m-d'), $passage->published_at->format('Y-m-d'));
        $analytics['activeUsers'] = $this->analytics->getActiveUsers();

        $passage->verses = $this->scripture->getScripture($passage->title);
        $passage->audio = $this->scripture->getAudioScripture($passage->title);

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
