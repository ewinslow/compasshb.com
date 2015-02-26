<?php namespace CompassHB\Www;

// use Illuminate\Database\Eloquent\Model;

class WPost {

	public function __construct()
	{
		$params = array(
    		'database'  => getenv('DB_NAME'),
    		'username'  => getenv('DB_USER'),
    		'password'  => getenv('DB_PASSWORD'),
    		'prefix'    => 'wp_');
		
		\Corcel\Database::connect($params);
	}

	public function get($format = 'blog', $number = 1)
	{
		return \Post::taxonomy('format', $format)->published()->with('attachment')->take($number)->get();
	}

	public function getMeta($post, $key)
	{
		foreach ($post->meta as $meta)
		{
			if ($meta->meta_key == $key)
			{
				return $meta->meta_value;
			}
		}

		return false;

	}

	public function getSingle($year, $date, $slug)
	{
		return \Post::slug($slug)->get();
	}

}
