<?php namespace CompassHB\Www\Http\Controllers;

use CompassHB\Www\Song;
use CompassHB\Www\Http\Requests;
use CompassHB\Www\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FeedsController extends Controller {

  /**
   * Create a new controller instance.
   */
  public function __construct()
  {
      $this->middleware('guest');
  }

	public function sermons()
	{
    $this->posts = new \CompassHB\Www\WPost();

    $sermons = $this->posts->get('sermon', 300);

    return view('feeds.sermons', compact('sermons'));
	}

  /**
   * Generate XML of songs with MP3s
   */
	public function songs()
	{
		$songs = Song::latest('published_at')->published()->get()->shuffle();

		return view('feeds.songs', compact('songs'));
	}

}
