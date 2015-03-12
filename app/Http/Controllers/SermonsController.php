<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use CompassHB\Www\Sermon;
use CompassHB\Www\Http\Requests\SermonRequest;
use CompassHB\Www\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SermonsController extends Controller {

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
		$sermons = Sermon::latest('published_at')->published()->get();

		return view('sermons.index', compact('sermons'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('sermons.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(SermonRequest $request)
	{
		$sermon = new Sermon($request->all());

		Auth::user()->sermons()->save($sermon);

		return redirect('admin');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Sermon $sermon)
	{
		return view('sermons.show', compact('sermon'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Sermon $sermon)
	{
		return view('sermons.edit', compact('sermon'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Sermon $sermon, SermonRequest $request)
	{
		$sermon->update($request->all());

		return redirect('admin');
	}

}