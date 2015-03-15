<?php namespace CompassHB\Www\Http\Controllers;

use Auth;
use CompassHB\Www\Blog;
use CompassHB\Www\Http\Requests\BlogRequest;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
  /**
   * Create a new controller instance.
   */
  public function __construct()
  {
      $this->middleware('auth', ['only' => ['edit', 'update', 'create', 'store', 'destroy']]);
  }

    /**
     * Show all blogs.
     *
     * @return Response
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
     * @return Response
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'))
            ->with('title', $blog->title);
    }

    /**
     * Edit an existing blog.
     *
     * @param Blog $blog
     *
     * @return Response
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

        return redirect('admin')
            ->with('message', 'Success! Your blog was saved.');
    }

    /**
     * Show the page to create a new blog.
     *
     * @return Response
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

        return redirect('admin')
            ->with('message', 'Success! Your blog was saved.');
    }
}
