<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use CompassHB\Www\Blog;
use CompassHB\Vimeo\VimeoVideo;
use CompassHB\Www\Http\Requests\BlogRequest;

class BlogsController extends Controller
{
    private $videoClient;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update', 'create', 'store', 'destroy']]);
        $this->videoClient = new VimeoVideo();
    }

    /**
     * Show all blogs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::latest('published_at')->published()->get();

        return view('blogs.index', compact('blogs'))
            ->with('title', 'Blog');
    }

    /**
     * Show a single blog.
     *
     * @param Blog $blog
     *
     * @return \Illuminate\View\View
     */
    public function show(Blog $blog)
    {
        $blog->iframe = '';

        if (!empty($blog->video)) {
            $blog->iframe = $this->videoClient->oembed($blog->video);
        }

        return view('blogs.show', compact('blog'))
            ->with('title', $blog->title);
    }

    /**
     * Edit an existing blog.
     *
     * @param Blog $blog
     *
     * @return \Illuminate\View\View
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update a blog.
     *
     * @param Blog        $blog
     * @param BlogRequest $request
     *
     * @return Response
     */
    public function update(Blog $blog, BlogRequest $request)
    {
        $blog->update($request->all());

        return redirect()
            ->route('admin.blog')
            ->with('message', 'Success! Your blog was updated.');
    }

    /**
     * Show the page to create a new blog.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a new blog.
     *
     * @param BlogRequest $request
     *
     * @return Response
     */
    public function store(BlogRequest $request)
    {
        $blog = new Blog($request->all());

        Auth::user()->blogs()->save($blog);

        return redirect()
            ->route('admin.blog')
            ->with('message', 'Success! Your blog was saved.');
    }
}
