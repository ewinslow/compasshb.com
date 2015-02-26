<?php namespace CompassHB\Www\Http\Controllers;

use CompassHB\Www\Http\Requests;
use CompassHB\Www\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public $posts;

	public function __construct()
	{
		$this->posts = new \CompassHB\Www\WPost;
	}

	/**
	 * Dynamic single post requests
	 */
	public function singlepost($year, $date, $slug)
	{
		$single = $this->posts->getSingle($year, $date, $slug);
		$category = $single->first()->taxonomies;
		$category = $category[1]->term->name;

		if (in_tax($single, 'Format', 'Scripture of the Day'))
		{
			$esv = new \CompassHB\Www\Esv\Esv;
			$content = $esv->getScripture($single[0]->post_title);

			$postflash = '<div class="alert alert-info" role="alert"><strong>New Post!</strong> You are reading an old post. For today\'s, <a href="/read">click here.</a></div>';

			return view('pages.read')->with('content', $content)
									 ->with('postflash', $postflash);
		}

		return view('pages.blog')->with('single', $single);

	}

    public function read()
    {

    	$read = $this->posts->get('scripture-of-the-day', 1);

    	$esv = new \CompassHB\Www\Esv\Esv;

    	$content = $esv->getScripture($read[0]->post_title);

        return view('pages.read')->with('post', $read)
        						 ->with('content', $content)
        						 ->with('postflash', '');
    }

    /**
     * Static page requests
     */
    public function pray()
    {
        return view('pages.pray');
    }

    public function fellowship()
    {
        return view('pages.fellowship');
    }

    public function serve()
    {
        return view('pages.serve');
    }

    public function learn()
    {
        return view('pages.learn');
    }

	public function youth()
	{
		return view('pages.youth');
	}

	public function whoweare()
	{
		return view('pages.whoweare');
	}

	public function eightdistinctives()
	{
		return view('pages.eightdistinctives');
	}

	public function give()
	{
		return view('pages.give');
	}

	public function icecreamevangelism()
	{
		return view('pages.icecreamevangelism');
	}

	public function kidsministry()
	{
		return view('pages.kidsministry');
	}

	public function whatwebelieve()
	{
		return view('pages.whatwebelieve');
	}

	public function calendar()
	{
		return view('pages.calendar');
	}

	public function college()
	{
		return view('pages.college');
	}

	/**
	 * Homepage
	 */
	public function home()
	{		

		$sermons = $this->posts->get('sermon', 3);
//		$sermons_text = $posts->getMeta($sermons[0], 'sermon_text');

		$blogs = $this->posts->get('blog', 2);
		$reading = $this->posts->get('scripture-of-the-day', 1);

		//      dd($posts->getMeta($sermons[0], 'sermon_text'));


		return view('app')->with('sermons', $sermons)
						  ->with('blogs', $blogs)
						  ->with('reading', $reading);

	}

}
