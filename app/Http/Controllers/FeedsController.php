<?php namespace CompassHB\Www\Http\Controllers;

use Response;
use CompassHB\Www\Song;
use CompassHB\Www\Sermon;

class FeedsController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Feed to podcasting and RSS.
     *
     * @return \Illuminate\View\View
     */
    public function sermons()
    {
        $data['sermons'] = Sermon::orderBy('published_at', 'desc')->limit(300)->get();

        return Response::view('feeds.rss', $data, 200, [
            'Content-Type' => 'application/atom+xml; charset=UTF-8',
        ]);
    }

    /**
     * Generate XML of songs with MP3s.
     * Used for the audio player on the songs page.
     */
    public function songs()
    {
        $songs = Song::latest('published_at')->published()->get()->shuffle();

        return view('feeds.songs', compact('songs'));
    }

    public function getsermonlist()
    {
        $sermons = ''; //todo
        return view('feeds.sermons', compact('sermons'));
    }
}
