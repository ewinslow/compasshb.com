<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use Input;
use SearchIndex;
use CompassHB\Www\Series;
use CompassHB\Www\Sermon;
use CompassHB\Www\Http\Requests\SermonRequest;
use CompassHB\Www\Repositories\Video\VideoRepository;
use CompassHB\Www\Repositories\Upload\UploadRepository;

class SermonsController extends Controller
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
    public function index(VideoRepository $video)
    {
        $sermons = Sermon::where('ministry', '=', null)->latest('published_at')->published()->get();

        foreach ($sermons as $sermon) {
            $video->setUrl($sermon->video);
            $sermon->image = $video->getThumbnail();
        }

        return view('dashboard.sermons.index', compact('sermons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $series = Series::lists('title', 'id');
        array_unshift($series, 'No Series');

        return view('admin.sermons.create')
            ->with('series', $series);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Cloud
     * @param SermonRequest
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SermonRequest $request, UploadRepository $upload)
    {
        $sermon = new Sermon($request->all());
        $worksheet = Input::file('worksheet');

        // Save worksheet if one was uploaded
        if ($worksheet !== null) {
            $sermon->worksheet = $upload->uploadAndSaveS3(\Input::file('worksheet'), 'worksheets');
        }

        Auth::user()->sermons()->save($sermon);

  //      SearchIndex::upsertToIndex($sermon);

        return redirect()
            ->route('admin');
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\View\View
     */
    public function show(Sermon $sermon, VideoRepository $video)
    {
        $video->setUrl($sermon->video);

        $sermon->iframe = $video->getEmbedCode();
        $coverimage = $video->getThumbnail();

        return view('dashboard.sermons.show',
            compact('sermon', 'coverimage'))
            ->with('title', $sermon->title)
            ->with('ogdescription', $sermon->excerpt);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\View\View
     */
    public function edit(Sermon $sermon)
    {
        $series = Series::lists('title', 'id');
        array_unshift($series, 'No Series');

        return view('admin.sermons.edit', compact('sermon'))
            ->with('series', $series);
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Sermon $sermon, SermonRequest $request, UploadRepository $upload)
    {
        $worksheet = Input::file('worksheet');
        $all = $request->all();

        // Replace worksheet if one was uploaded
        if ($worksheet !== null) {
            $all['worksheet'] = $upload->uploadAndSaveS3(\Input::file('worksheet'), 'worksheets');
        }

        $sermon->update($all);

        SearchIndex::upsertToIndex($sermon);

        return redirect()
            ->route('admin')
            ->with('message', 'Success! Your sermon was updated.');
    }

    /**
     * Redirect to sermon download link.
     *
     * @param Sermon
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function download(Sermon $sermon, VideoRepository $video)
    {
        $video->setUrl($sermon->video);

        return redirect()->to($video->getDownloadLink());
    }
}
