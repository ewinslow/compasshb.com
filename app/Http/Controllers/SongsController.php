<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use CompassHB\Www\Song;
use CompassHB\Www\Http\Requests\SongRequest;

class SongsController extends Controller
{
  /**
   * Create a new controller instance.
   */
  public function __construct()
  {
      $this->middleware('auth', ['only' => ['edit', 'update', 'create', 'store', 'destroy']]);
  }

    /**
     * Show all songs.
     *
     * @return Response
     */
    public function index()
    {
        $songs = Song::latest('published_at')->published()->get();

        foreach ($songs as $song) {
            $song->thumbnail = get_othumb($song->video);
        }

        $setlist = last_weeks_set_list();

        return view('songs.index', compact('songs', 'setlist'));
    }

    /**
     * Show a single song.
     *
     * @param Song $song
     *
     * @return Response
     */
    public function show(Song $song)
    {
        $song->iframe = oembed($song->video);

        return view('songs.show', compact('song'));
    }

    /**
     * Edit an existing song.
     *
     * @param Song $song
     *
     * @return Response
     */
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    /**
     * Update a song.
     *
     * @param Song        $song
     * @param SongRequest $request
     *
     * @return Response
     */
    public function update(Song $song, SongRequest $request)
    {
        $song->update($request->all());

        return redirect('admin')
            ->with('message', 'Success! Your song was updated.');
    }

    /**
     * Show the page to create a new song.
     *
     * @return Response
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a new song.
     *
     * @param SongRequest $request
     *
     * @return Response
     */
    public function store(SongRequest $request)
    {
        $song = new Song($request->all());

        Auth::user()->songs()->save($song);

        return redirect('admin')
            ->with('message', 'Success! Your song was saved.');
    }
}
