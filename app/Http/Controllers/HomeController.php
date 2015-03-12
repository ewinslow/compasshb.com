<?php namespace CompassHB\Www\Http\Controllers;

use CompassHB\Www\Blog;
use CompassHB\Www\Song;
use CompassHB\Www\Sermon;
use CompassHB\Www\Passage;
use CompassHB\Www\Fellowship;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $songs = Song::latest()->get();
        $blogs = Blog::latest('published_at')->get();
        $sermons = Sermon::latest('published_at')->get();
        $passages = Passage::latest('published_at')->get();
        $fellowships = Fellowship::latest('day')->get();

        return view('admin.home', compact(
            'songs',
            'blogs',
            'passages',
            'fellowships',
            'sermons'
        ))->with('title', 'Admin');
    }
}
