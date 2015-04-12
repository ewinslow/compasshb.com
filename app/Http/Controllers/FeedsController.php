<?php namespace CompassHB\Www\Http\Controllers;

use Cache;
use Response;
use CompassHB\Www\Song;
use CompassHB\Www\Sermon;
use CompassHB\Video\Client;

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
        $data['sermons'] = Sermon::where('ministry', '=', null)->orderBy('published_at', 'desc')->limit(300)->get();

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

    /**
     * Feed to mobile app.
     *
     * @return \Illuminate\View\View
     */
    public function json()
    {
        $data['sermons'] = Sermon::where('ministry', '=', null)->orderBy('published_at', 'desc')->published()->limit(300)->get();

        // Retrieve coverart
        foreach ($data['sermons'] as $sermon) {
            if (!Cache::has($sermon->video)) {
                $client = new Client($sermon->video);
                Cache::add($sermon->video, $client->getThumbnail(), 1440);
            }

            $sermon->othumbnail = Cache::get($sermon->video);
            $sermon->date = $sermon->published_at->format('F, j Y');
        }

        return Response::view('feeds.json', $data, 200, [
            'Content-Type' => 'application/json; charset=UTF-8',
        ]);
    }
}
