<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use CompassHB\Www\Slide;
use CompassHB\Www\Http\Requests\SlideRequest;

class SlidesController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update', 'create', 'store', 'destroy']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SlideRequest $request)
    {
        $slide = new Slide($request->all());

        Auth::user()->slides()->save($slide);

        return redirect()
            ->route('admin.mainservice')
            ->with('message', 'Success! Your slide was saved.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\View\View
     */
    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'))->with('title', 'Edit Slide');
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Slide $slide, SlideRequest $request)
    {
        $slide->update($request->all());

        return redirect()
            ->route('admin.mainservice')
            ->with('message', 'Success! Your slide was updated.');
    }
}
