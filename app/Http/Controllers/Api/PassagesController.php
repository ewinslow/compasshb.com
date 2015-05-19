<?php namespace CompassHB\Www\Http\Controllers\Api;

use Response;
use CompassHB\Www\Passage;
use CompassHB\Www\Http\Controllers\Controller;
use CompassHB\Www\Repositories\Scripture\ScriptureRepository;

class PassagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ScriptureRepository $scripture)
    {
        $passages = Passage::latest('published_at')->published()->take(1)->get();
        $passage = $passages->first();
        $passage->verses = $scripture->getScripture($passage->title);

        return Response::json($passage->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
