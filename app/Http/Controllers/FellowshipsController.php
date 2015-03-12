<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use CompassHB\Www\Fellowship;
use CompassHB\Www\Http\Requests\FellowshipRequest;

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
     * @return Response
     */
    public function index()
    {
        $fellowships = Fellowship::all()->toArray();
        $days = array_unique(array_column($fellowships, 'day'));

        return view('fellowships.index', compact('fellowships', 'days'))
        ->with('title', 'Home Fellowship Groups');
    }

    /**
     * Edit an existing fellowship.
     *
     * @param Fellowship $fellowship
     *
     * @return Response
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
     * @return Response
     */
    public function update(Fellowship $fellowship, FellowshipRequest $request)
    {
        $fellowship->update($request->all());

        return redirect('fellowship');
    }

    /**
     * Show the page to create a new fellowship.
     *
     * @return Response
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
     * @return Response
     */
    public function store(FellowshipRequest $request)
    {
        $fellowship = new Fellowship($request->all());

        Auth::user()->fellowships()->save($fellowship);

        return redirect('fellowship');
    }
}
