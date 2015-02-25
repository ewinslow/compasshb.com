<?php namespace CompassHB\Www\Http\Controllers;

use CompassHB\Www\Http\Requests;
use CompassHB\Www\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function content($year, $date, $slug)
	{
		// All published posts
		$posts = \Post::slug($slug)->get();

		return view('college')->with('posts', $posts);
	}

    public function read()
    {

    	$posts = new \CompassHB\Www\WPost;

    	$read = $posts->get('scripture-of-the-day', 1);

    	$esv = new \CompassHB\Www\Esv\Esv;

    	$content = $esv->retrieveScripture($read[0]->post_title);

        return view('pages.read')->with('post', $read)->with('content', $content);
    }

    public function pray()
    {
        return view('pages.pray');
    }

    public function fellowship()
    {
        return view('pages.fellowship');
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

	public function home()
	{		
		$posts = new \CompassHB\Www\WPost;

		$sermons = $posts->get('sermon', 3);
//		$sermons_text = $posts->getMeta($sermons[0], 'sermon_text');

		$blogs = $posts->get('blog', 2);
		$reading = $posts->get('scripture-of-the-day', 1);

		//      dd($posts->getMeta($sermons[0], 'sermon_text'));


		return view('app')->with('sermons', $sermons)
						  ->with('blogs', $blogs)
						  ->with('reading', $reading);

	}

}
