<?php

/*
 * Route for songs.
 */
Route::resource('songs', 'SongsController', ['except' => ['destroy']]);

/*
 * Route for passages
 */
Route::resource('read', 'PassagesController', ['except' => ['destroy']]);

/*
 * Route for slides
 */
Route::resource('slides', 'SlidesController', ['except' => ['destroy', 'show', 'index']]);

/*
 * Route for fellowships
 */
Route::resource('fellowship', 'FellowshipsController', ['except' => ['destroy', 'show']]);

Route::get('fellowship/{id}/{slug}', [
    'as' => 'fellowship.show',
    'uses' => 'FellowshipsController@show',
]);

/*
 * Route for sermons
 */
Route::resource('sermons', 'SermonsController', ['except' => ['destroy']]);
Route::get('sermons/{sermons}/download', [
    'as' => 'sermons.download',
    'uses' => 'SermonsController@download',
]);

/*
 * Route for sermon series
 */
Route::resource('series', 'SeriesController', ['except' => ['destroy']]);

/*
 * Route for blogs
 */
Route::resource('blog', 'BlogsController', ['except' => ['destroy']]);

/*
 * Route for homepage
 */
Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home',
]);

/*
 * Route for photos
 */
Route::get('photos', [
    'as' => 'photos',
    'uses' => 'PagesController@photos',
]);

/*
 * Route for pray
 */
Route::get('pray', [
    'as' => 'pray',
    'uses' => 'PagesController@pray',
]);

/*
 * Routes for feeds
 */
Route::group(['prefix' => 'feed'], function () {

    Route::get('sermons',  [
        'as' => 'feed.sermons',
        'uses' => 'FeedsController@sermons',
    ]);

    Route::get('sermons.json',  [
        'middleware' => 'cors',
        'as' => 'feed.sermons.json',
        'uses' => 'FeedsController@json',
    ]);

    Route::get('songs.xml', [
        'as' => 'feed.songs.xml',
        'uses' => 'FeedsController@songs',
    ]);

    Route::get('blog.xml', [
        'as' => 'feed.blog.xml',
        'uses' => 'FeedsController@blog',
    ]);

    Route::get('read.xml', [
        'as' => 'feed.read.xml',
        'uses' => 'FeedsController@read',
    ]);
});

/*
 * Routes for APIs
 */
Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('songs', 'Api\SongsController', ['except' => ['destroy']]);
    Route::resource('passages', 'Api\PassagesController', ['except' => ['destroy']]);
    Route::resource('slides', 'Api\SlidesController', ['except' => ['destroy', 'show', 'index']]);
    Route::resource('fellowship',  'Api\FellowshipController', ['except' => ['destroy', 'show']]);
    Route::resource('sermons', 'Api\SermonsController', [
            'middleware' => 'cors',
            'except' => ['destroy'],
        ]);
    Route::resource('series', 'Api\SeriesController', ['except' => ['destroy']]);
    Route::resource('blog', 'Api\BlogController', ['except' => ['destroy']]);
    Route::get('cleareventcache/{auth?}', [
        'as' => 'cleareventcache',
        'uses' => 'PagesController@cleareventcache',
    ]);
});

Route::group(['prefix' => 'api/1.0'], function () {
    Route::get('getsermonlist.json', 'FeedsController@getsermonlist');
});

/*
 * Routes for static pages
 */
Route::get('who-we-are', [
    'as' => 'who-we-are',
    'uses' => 'PagesController@whoweare',
]);

Route::get('eight-distinctives', [
    'as' => 'distinctives',
    'uses' => 'PagesController@eightdistinctives',
]);

Route::get('give', [
    'as' => 'give',
    'uses' => 'PagesController@give',
]);

Route::get('ice-cream-evangelism', [
    'as' => 'evangelism',
    'uses' => 'PagesController@icecreamevangelism',
]);

Route::get('what-we-believe', [
    'as' => 'believe',
    'uses' => 'PagesController@whatwebelieve',
]);

Route::get('events/{id?}/{slug?}', [
    'as' => 'events.index',
    'uses' => 'PagesController@events',
]);
/***********************************************************************
 * Routes for ministry pages
 */

/*
 * Route for Kids ministry
 */
Route::get('kids', [
    'as' => 'kids',
    'uses' => 'MinistryController@kids',
]);

/*
 * Route for Youth ministry
 */
Route::get('youth', [
    'as' => 'youth',
    'uses' => 'MinistryController@youth',
]);

/*
 * Route for Sunday School ministry
 */
Route::group(['prefix' => 'sundayschool'], function () {

    Route::get('/', [
        'as' => 'sundayschool',
        'uses' => 'MinistryController@sundayschool',
    ]);

});

/*
 * Route for college ministry
 */
Route::get('college', [
    'as' => 'college',
    'uses' => 'MinistryController@college',
]);

/*
 * Routes for landing pages
 */
Route::get('bunnyrun', [
    'as' => 'bunnyrun',
    'uses' => 'PagesController@bunnyrun',
]);

/*
 * Analytics Sitemap XML
 */
Route::get('sitemap.xml', [
    'as' => 'sitemap',
    'uses' => 'PagesController@sitemap',
]);

/*
 * Manifest file
 */
Route::get('manifest.json', [
    'as' => 'manifest',
    'uses' => 'PagesController@manifest',
]);

Route::get('search/{q}', [
    'as' => 'search',
    'uses' => 'PagesController@search',
]);

/*
 * Administration Pages
 */
Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [
        'as' => 'admin',
        'uses' => 'HomeController@index',
    ]);

    Route::get('mainservice', [
        'as' => 'admin.mainservice',
        'uses' => 'HomeController@mainservice',
    ]);

    Route::get('songs', [
        'as' => 'admin.songs',
        'uses' => 'HomeController@songs',
    ]);

    Route::get('read', [
        'as' => 'admin.read',
        'uses' => 'HomeController@read',
    ]);

    Route::get('fellowship', [
        'as' => 'admin.fellowship',
        'uses' => 'HomeController@fellowship',
    ]);

    Route::get('sundayschool', [
        'as' => 'admin.sundayschool',
        'uses' => 'HomeController@sundayschool',
    ]);

});

/*
 * Authentication
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
