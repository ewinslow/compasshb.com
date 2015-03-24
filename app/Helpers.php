<?php

use GuzzleHttp\Client;
use Illuminate\Support\Str;

/**
 * Helper functions created specifically for this site are
 * stored here until they get moved to a better place.
 */

/**
 * Set active link on side navigation.
 *
 * @param string
 * @param string
 *
 * @return string
 */
function set_active($path, $active = 'active')
{
    return Request::is($path.'*') ? $active : '';
}

/**
 * Returns the largest thumbnail from a video
 * from Vimeo for use on homepage banner.
 *
 * @param  string
 *
 * @return string
 */
function getvideothumb($url)
{
    // Parse Vimeo video ID
    $videoid = substr($url, strrpos($url, '/') + 1);

    $vimeo = new \Vimeo\Vimeo(
        getenv('VIMEO_CLIENT_ID'),
        getenv('VIMEO_CLIENT_SECRET'),
        getenv('VIMEO_TOKEN'));

    $video = $vimeo->request("/videos/$videoid");

    // @todo: try/catch this
    if ($video['status'] == '404' || $video['status'] == '400') {
        return;
    }

    // Get the video thumbnail
    if (isset(end($video['body']['pictures']['sizes'])['link'])) {
        return end($video['body']['pictures']['sizes'])['link'];
    }

    return;
}

/**
 * Make an oembed request and return the thumbnail.
 */
function get_othumb($url)
{
    $client = new \GuzzleHttp\Client();

    $request = 'https://vimeo.com/api/oembed.json?url='.$url;

    try {
        $response = $client->get($request);
    } catch (Exception $e) {
        return;
    }

    $response_body = json_decode($response->getBody());

    return $response_body->thumbnail_url;
}

/**
 * Oembed iframe.
 */
function oembed($url = '')
{
    $client = new \GuzzleHttp\Client();

    $request = 'https://vimeo.com/api/oembed.json?autoplay=true&url='.$url;

    try {
        $response = $client->get($request);
    } catch (Exception $e) {
        return;
    }

    $response_body = json_decode($response->getBody());

    return $response_body->html;
}

/**
 * Find out what songs were sung last weekend.
 *
 * @return type
 */
function getSetList()
{
    /*$client = new \GuzzleHttp\Client();

    $url = 'https://www.planningcenteronline.com/organization.json';
    $response = $client->get($url);

    $response_body = json_decode($response->getBody());*/

    return;
}

/**
 * Create a model's slug.
 *
 * @param  string $title
 *
 * @return string
 */
function makeSlugFromTitle($model, $title)
{
    $slug = Str::slug($title);

    $count = $model::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

    return $count ? "{$slug}-{$count}" : $slug;
}
