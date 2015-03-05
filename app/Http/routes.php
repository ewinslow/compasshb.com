<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * Temporary Redirects
 */
Route::get('/wp-admin', function()
{
	return redirect('/wp/wp-admin');
});

/*
 * Home Page
 */
Route::get('/', [
	'as' => 'home', 
	'uses' => 'PagesController@home'
]);

/*
 * Dynamic Pages
 * /2015/02/page-title-here
 *
 */
Route::get('{year}/{month}/{slug}', 'PagesController@singlepost')
	->where(['year' => '\d{4}', 'month' => '\d{2}']);

Route::get('{year}/{month}/{slug}/podcast/{video_id}.mp4', 'PagesController@podcast')
	->where(['year' => '\d{4}', 'month' => '\d{2}']);

Route::get('read', [
	'as' => 'read', 
	'uses' => 'PagesController@read'
]);

Route::get('fellowship', [
	'as' => 'fellowship', 
	'uses' => 'PagesController@fellowship'
]);

Route::get('worship', [
	'as' => 'worship', 
	'uses' => 'PagesController@worship'
]);

/**
 * Routes without controllers
 */

Route::get('pray', ['as' => 'pray', function() 
{  
	return view('pages.pray')->with('title', 'Pray'); 
}]);

Route::get('sermons', ['as' => 'sermons', function()
{
	return view('pages.sermons')->with('title', 'Sermons');
}]);

Route::get('who-we-are', ['as' => 'who-we-are', function()
{
	return view('pages.whoweare')->with('title', 'Who We Are');
}]);

Route::get('eight-distinctives', ['as' => 'distinctives', function()
{
	return view('pages.eightdistinctives')->with('title', '8 Distinctives');
}]);

Route::get('give', ['as' => 'give', function()
{
	return view('pages.give')->with('title', 'Give');
}]);

Route::get('ice-cream-evangelism', ['as' => 'evangelism', function()
{
	return view('pages.icecreamevangelism')->with('title', 'Ice Cream Evangelism');
}]);

Route::get('kids', ['as' => 'kids', function()
{
	return view('pages.kids')->with('title', 'Kids Ministry');
}]);

Route::get('what-we-believe', ['as' => 'believe', function()
{
	return view('pages.whatwebelieve')->with('title', 'What We Believe');
}]);

Route::get('calendar', ['as' => 'calendar', function()
{
	return view('pages.calendar')->with('title', 'Calendar');
}]);

Route::get('youth', ['as' => 'youth', function()
{
	return view('pages.youth')->with('title', 'The United');
}]);

Route::get('college', ['as' => 'college', function()
{
	return view('pages.college')->with('title', 'The Underground');
}]);

Route::get('sundayschool', ['as' => 'sundayschool', function()
{
	return view('pages.sundayschool')->with('title', 'Sunday School');
}]);

Route::get('photos', ['as' => 'photos', function()
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
}]);

/**
 * Landing Pages
 */
Route::get('bunnyrun', ['as' => 'bunnyrun', function()
{
	return view('pages.landing.bunnyrun')->with('title', 'The Bunny Run 5K');
}]);

/**
 * Archives
 */
Route::get('videos', ['as' => 'videos', function()
{
	return view('archives.videos')->with('title', 'Videos');
}]);