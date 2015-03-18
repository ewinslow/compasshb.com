<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use CompassHB\Www\Passage;
use CompassHB\Www\Http\Requests\PassageRequest;
use Illuminate\Http\Request;

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
     * @return Response
     */
    public function index()
    {
        $esv = new \CompassHB\Www\Esv\Esv();

        $passages = Passage::latest('published_at')->published()->take(5)->get();
        $passage = $passages->first();
        $passage->verses = $esv->getScripture($passage->title);

        $postflash = '';

        if (date('D') == "Sun" || date('D') == "Sat") {
            $postflash = '<div class="alert alert-info" role="alert">Scripture of the Day is posted Monday through Friday.</div>';
        }

        return view('passages.index', compact('passages', 'passage', 'postflash'))
            ->with('title', 'Scripture of the Day');
    }

    /**
     * Show a single passage.
     *
     * @param Passage $passage
     *
     * @return Response
     */
    public function show(Passage $passage)
    {
        $passages = Passage::latest('published_at')->published()->take(5)->get();

        $esv = new \CompassHB\Www\Esv\Esv();

        $passage->verses = $esv->getScripture($passage->title);

        $postflash = '<div class="alert alert-info" role="alert"><strong>New Post!</strong> You are reading an old post. For today\'s, <a href="/read">click here.</a></div>';

        if ($passage->published_at->isToday()) {
            $postflash = '';
        }

        return view('passages.show', compact('passage', 'passages', 'postflash'))
            ->with('title', $passage->title);
    }

    /**
     * Edit an existing passage.
     *
     * @param Passage $passage
     *
     * @return Response
     */
    public function edit(Passage $passage)
    {
        return view('passages.edit', compact('passage'));
    }

    /**
     * Update a passage.
     *
     * @param Passage        $passage
     * @param PassageRequest $request
     *
     * @return Response
     */
    public function update(Passage $passage, PassageRequest $request)
    {
        $passage->update($request->all());

        return redirect('admin')
            ->with('message', 'Success! Your Scripture of the Day was saved.');
    }

    /**
     * Show the page to create a new passage.
     *
     * @return Response
     */
    public function create()
    {
        return view('passages.create');
    }

    /**
     * Store a new passage.
     *
     * @param PassageRequest $request
     *
     * @return Response
     */
    public function store(PassageRequest $request)
    {
        $passage = new Passage($request->all());

        Auth::user()->passages()->save($passage);

        return redirect('admin')
            ->with('message', 'Success! Your Scripture of the Day was saved.');
    }
}
