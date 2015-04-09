<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use Input;
use CompassHB\Www\Sermon;
use CompassHB\Aws\AwsUploader;
use CompassHB\Vimeo\VimeoVideo;
use CompassHB\Www\Http\Requests\SermonRequest;

class SermonsController extends Controller
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
        $sermons = Sermon::latest('published_at')->published()->get();

        return view('dashboard.sermons.index', compact('sermons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.sermons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Cloud
     * @param SermonRequest
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SermonRequest $request, AwsUploader $client)
    {
        $sermon = new Sermon($request->all());
        $worksheet = Input::file('worksheet');

        // Save worksheet if one was uploaded
        if ($worksheet != null) {
            $sermon->worksheet = $client->uploadAndSaveS3(\Input::file('worksheet'), 'worksheets');
        }

        Auth::user()->sermons()->save($sermon);

        return redirect()
            ->route('admin.sermons')
            ->with('message', 'Success! Your sermon was saved.');
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\View\View
     */
    public function show(Sermon $sermon)
    {
        $sermon->iframe = $this->videoClient->oembed($sermon->video);

        return view('dashboard.sermons.show', compact('sermon'))
            ->with('title', $sermon->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\View\View
     */
    public function edit(Sermon $sermon)
    {
        return view('dashboard.sermons.edit', compact('sermon'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Sermon $sermon, SermonRequest $request, AwsUploader $client)
    {
        $worksheet = Input::file('worksheet');
        $all = $request->all();

        // Replace worksheet if one was uploaded
        if ($worksheet != null) {
            $all['worksheet'] = $client->uploadAndSaveS3(\Input::file('worksheet'), 'worksheets');
        }

        $sermon->update($all);

        return redirect()
            ->route('admin.sermons')
            ->with('message', 'Success! Your sermon was updated.');
    }

    /**
     * Redirect to sermon download link.
     *
     * @param Sermon
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function download(Sermon $sermon)
    {
        $video = $this->videoClient->getDownloadLink($sermon->video);

        return redirect()->to($video);
    }
}
