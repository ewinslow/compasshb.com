<?php namespace CompassHB\Www\Http\Controllers;

use CompassHB\Www\Song;

class FeedsController extends Controller
{
  /**
   * Create a new controller instance.
   */
  public function __construct()
  {
      $this->middleware('guest');
  }

    public function sermons()
    {
        $sermons = ''; //todo

        // getvideothumb($sermon->meta->video_oembed)

        return view('feeds.sermons', compact('sermons'));
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
