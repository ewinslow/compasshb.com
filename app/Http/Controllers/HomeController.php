<?php namespace CompassHB\Www\Http\Controllers;

use CompassHB\Www\Blog;
use CompassHB\Www\Song;
use CompassHB\Www\Slide;
use CompassHB\Www\Sermon;
use CompassHB\Www\Series;
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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.home')->with('title', 'Admin');
    }

    public function songs()
    {
        $songs = Song::latest()->paginate(15);

        return view('admin.songs', compact('songs'))
            ->with('title', 'Admin - Songs');
    }

    public function blog()
    {
        $blogs = Blog::latest('published_at')->paginate(15);

        return view('admin.blog', compact('blogs'))
            ->with('title', 'Admin - Blog');
    }

    public function sermons()
    {
        $sermons = Sermon::latest('published_at')->paginate(15);

        return view('admin.sermons', compact('sermons'))
            ->with('title', 'Admin - Sermons');
    }

    public function read()
    {
        $passages = Passage::latest('published_at')->paginate(15);

        return view('admin.read', compact('passages'))
            ->with('title', 'Admin - Scripture of the Day');
    }

    public function fellowship()
    {
        $fellowships = Fellowship::latest('day')->paginate(15);

        return view('admin.fellowship', compact('fellowships'))
            ->with('title', 'Admin - Home Fellowship Groups');
    }

    public function sundayschool()
    {
        return 'Coming soon...';
    }

    public function slides()
    {
        $slides = Slide::latest('published_at')->paginate(15);

        return view('admin.slides', compact('slides'))
            ->with('title', 'Admin - Slides');
    }

    public function series()
    {
        $series = Series::paginate(15);

        return view('admin.series', compact('series'))
            ->with('title', 'Admin - Series');
    }
}
