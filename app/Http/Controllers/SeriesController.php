<?php

namespace CompassHB\Www\Http\Controllers;

use Auth;
use CompassHB\Www\Series;
use CompassHB\Www\Sermon;
use CompassHB\Www\Repositories\Video\VideoRepository;
use CompassHB\Www\Http\Requests\SeriesRequest;

class SeriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update', 'create', 'store', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $series = Series::all()->reverse();

        return view('dashboard.series.index', compact('series'))
            ->with('title', 'Sermon Series');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SeriesRequest $request)
    {
        $series = new Series($request->all());

        Auth::user()->series()->save($series);

        return redirect()
            ->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\View\View
     */
    public function show(Series $series, VideoRepository $video)
    {
        $sermons = Sermon::where('series_id', '=', $series->id)->latest('published_at')->published()->get();

        foreach ($sermons as $sermon) {
            $video->setUrl($sermon->video);
            $sermon->image = $video->getThumbnail();
        }

        return view('dashboard.series.show', compact('series', 'sermons'))
            ->with('title', $series->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\View\View
     */
    public function edit(Series $series)
    {
        return view('admin.series.edit', compact('series'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Series $series, SeriesRequest $request)
    {
        $series->update($request->all());

        return redirect()
            ->route('admin.index')
            ->with('message', 'Success! Your series was updated.');
    }
}
