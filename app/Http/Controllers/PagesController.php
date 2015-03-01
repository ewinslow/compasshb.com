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
		$post = $this->posts->getSingle($year, $date, $slug);
		$category = $post->first()->taxonomies;
		$category = $category[1]->term->name;

		// Template for Scripture of the Day single posts
		if (in_tax($post, 'Format', 'Scripture of the Day'))
		{
			$esv = new \CompassHB\Www\Esv\Esv;
			$content = $esv->getScripture($post[0]->post_title);

			$postflash = '<div class="alert alert-info" role="alert"><strong>New Post!</strong> You are reading an old post. For today\'s, <a href="/read">click here.</a></div>';

			return view('pages.read')->with('content', $content)
									 ->with('postflash', $postflash)
									 ->with('post', $post)
									 ->with('title', $post[0]->post_title);
		}

		return view('pages.blog')->with('post', $post)
								 ->with('title', $post[0]->post_title);

	}

	// stub for downloading podcasts
	public function podcast($year, $date, $slug, $video_id)
	{
		$post = $this->posts->getSingle($year, $date, $slug);
		
		$video_url = $post[0]->meta->video_oembed;

		$video_id = substr($video_url, strrpos($video_url, '/') + 1);

        $vimeo = new \Vimeo\Vimeo(
        	env('VIMEO_CLIENT_ID'), 
        	env('VIMEO_CLIENT_SECRET'), 
        	env('VIMEO_TOKEN')
        );

         $video = $vimeo->request("/videos/$video_id");
         $video = $video['body'];
         $video = $video['download'];
         $video = $video[1];
         $video = $video['link'];
         
         return redirect($video);
	}

    public function read()
    {

    	$read = $this->posts->get('scripture-of-the-day', 6);

    	$esv = new \CompassHB\Www\Esv\Esv;

    	$content = $esv->getScripture($read[0]->post_title);

        return view('pages.read')->with('post', $read)
        						 ->with('content', $content)
        						 ->with('postflash', '')
        						 ->with('title', 'Scripture of the Day'); ;
    }

	/**
	 * Homepage
	 */
	public function home()
	{
		$sermons = $this->posts->get('sermon', 4);
		$upcomingsermon = $this->posts->get('sermon', 1, 'future');

		$blogs = $this->posts->get('blog', 2);
		$reading = $this->posts->get('scripture-of-the-day', 1);

		return view('app')->with('sermons', $sermons)
						  ->with('blogs', $blogs)
						  ->with('reading', $reading)
						  ->with('upcomingsermon', $upcomingsermon)
						  ->with('title', 'Huntington Beach'); ;
	}

}
