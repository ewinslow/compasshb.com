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

		if ($post->first()->meta->video_oembed)
		{
			$post->first()->oembedhtml = oembed($post->first()->meta->video_oembed);
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
        						 ->with('read', $read)
        						 ->with('content', $content)
        						 ->with('postflash', '')
        						 ->with('title', 'Scripture of the Day'); ;
    }

    public function fellowship()
    {
    	$sermons = $this->posts->get('sermon', 1);
		$read = $this->posts->get('scripture-of-the-day', 1);
		
		$client = new \GuzzleHttp\Client();

		foreach($sermons as $sermon)
		{
			$url = 'https://vimeo.com/api/oembed.json?url=' . $sermon->meta->video_oembed;
			$response = $client->get($url);
			$response_body = json_decode($response->getBody());
			$sermon->othumbnail = $response_body->thumbnail_url;
		}

		return view('pages.fellowship')
			->with('title', 'Home Fellowship Groups')
			->with('read', $read)
			->with('sermons', $sermons);
    }

    public function worship()
    {
    	$songs = $this->posts->get('worship-song', 6);
		$read = $this->posts->get('scripture-of-the-day', 1);    	

		$client = new \GuzzleHttp\Client();

    	foreach ($songs as $song)
    	{
		    $url = 'https://vimeo.com/api/oembed.json?url=' . $song->meta->video_oembed;
				$response = $client->get($url);
				$response_body = json_decode($response->getBody());
				$song->othumbnail = $response_body->thumbnail_url;
     	}

    	return view('pages.worship')
    		->with('songs', $songs)
    		->with('read', $read)
    		->with('title', 'Worship');
    }





	/**
	 * Homepage
	 */
	public function home()
	{
		$sermons = $this->posts->get('sermon', 4);
		$blogs = $this->posts->get('blog', 2);
		$videos = $this->posts->get('video', 2);
		$upcomingsermon = $this->posts->get('sermon', 1, 'future');
		$reading = $this->posts->get('scripture-of-the-day', 1);

		$client = new \GuzzleHttp\Client();

		foreach ($sermons as $sermon)
		{
			$url = 'https://vimeo.com/api/oembed.json?url=' . $sermon->meta->video_oembed;
			$response = $client->get($url);
			$response_body = json_decode($response->getBody());
			$sermon->othumbnail = $response_body->thumbnail_url;
		}

		foreach ($videos as $video)
		{
			$url = 'https://vimeo.com/api/oembed.json?url=' . $video->meta->video_oembed;
			$response = $client->get($url);
			$response_body = json_decode($response->getBody());
			$video->othumbnail = $response_body->thumbnail_url;
		}

    	// Instagram
    	$url = 'https://api.instagram.com/v1/users/1363574956/media/recent/?count=4&client_id=' . env('INSTAGRAM_CLIENT_ID');
		$instagrams = file_get_contents($url);
		$instagrams = json_decode($instagrams, true);

		// Smugmug
        $feedUrl = 'http://photos.compasshb.com/hack/feed.mg?Type=nicknameRecentPhotos&Data=compasshb&format=rss200&Size=Medium';
        $num = 4;

        $rawFeed = file_get_contents($feedUrl);
        $xml = new \SimpleXmlElement($rawFeed);
        $results = array();

        for ($i = 0; $i < $num; $i++) {
            // Parse Image Link
            $link = $xml->channel->item->link;
            $link = substr($link->asXML(), 6, -7);

            // Parse Image Source
            $namespaces = $xml->channel->item[$i]->getNameSpaces(true);
            $media = $xml->channel->item[$i]->children($namespaces['media']);
            $image = $media->group->content[3]->attributes();
            $image = $image['url']->asXML();
            $image = substr($image, 6, -1);

            $results[] = array($link, $image);
        }

		return view('app')->with('sermons', $sermons)
						  ->with('blogs', $blogs)
						  ->with('reading', $reading)
						  ->with('videos', $videos)
						  ->with('images', $results)
						  ->with('instagrams', $instagrams['data'])
						  ->with('upcomingsermon', $upcomingsermon)
						  ->with('title', 'Compass HB - Huntington Beach'); ;
	}

	public function photos()
	{
		// Smugmug
	  $feedUrl = 'http://photos.compasshb.com/hack/feed.mg?Type=nicknameRecentPhotos&Data=compasshb&format=rss200&Size=Medium';
	  $num = 40;

	  $rawFeed = file_get_contents($feedUrl);
	  $xml = new \SimpleXmlElement($rawFeed);
	  $results = array();

	  for ($i = 0; $i < $num; $i++) 
	  {
	      // Parse Image Link
	      $link = $xml->channel->item->link;
	      $link = substr($link->asXML(), 6, -7);

	      // Parse Image Source
	      $namespaces = $xml->channel->item[$i]->getNameSpaces(true);
	      $media = $xml->channel->item[$i]->children($namespaces['media']);
	      $image = $media->group->content[3]->attributes();
	      $image = $image['url']->asXML();
	      $image = substr($image, 6, -1);

	      $results[] = array($link, $image);
	  }

		return view('pages.photos')
			->with('title', 'Photography')
			->with('photos', $results);
	}

	public function sermons()
	{
		$sermons = $this->posts->get('sermon', 300);
		$read = $this->posts->get('scripture-of-the-day', 1);

		return view('pages.sermons')
			->with('sermons', $sermons)
			->with('read', $read)
			->with('title', 'Sermons');
	}

	public function pray()
	{
		$read = $this->posts->get('scripture-of-the-day', 1);
		return view('pages.pray')
			->with('title', 'Pray')
			->with('read', $read); 
	}

}


