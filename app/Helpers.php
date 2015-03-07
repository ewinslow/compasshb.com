<?php

/**
 * Helper functions created specifically for this site.
 */

/**
 * Sets the active link on the dashboard page navigation sidebar menu.
 */
function set_active($path, $active = 'active')
{
    return Request::is($path) ? $active : '';
}

/**
 * Checks if a given post is a category.
 */
function in_tax($post, $taxslug = 'Format', $term = 'Blog')
{
    $taxonomies = $post->first()->taxonomies;

    foreach ($taxonomies as $taxonomy) {
        if ($taxonomy->term->name == $term) {
            return true;
        }
    }
    //$category = $single->first()->taxonomies;
    //$category = $category[1]->term->name;

    return false;
}

/**
 * Returns the video thumbnail from a Vimeo URL.
 */
function getvideothumb($url)
{
    // Parse video ID (Vimeo-specific)
    $videoid = substr($url, strrpos($url, '/') + 1);

    // Create your API App (developer.vimeo.com/apps), place the data here
    $vimeo = new \Vimeo\Vimeo(
        getenv('VIMEO_CLIENT_ID'),
        getenv('VIMEO_CLIENT_SECRET'),
        getenv('VIMEO_TOKEN'));

    // Define from which video you want to pull data and make the request
    $video = $vimeo->request("/videos/$videoid");

    if ($video['status'] == '404' || $video['status'] == '400')
    {
        return;
    }

    // Get the video thumbnail
    $thumb = $video['body'];
    $thumb = $thumb['pictures'];
    $thumb = $thumb['sizes'];
    $thumb = end($thumb);
    $thumb = $thumb['link'];

    return $thumb;
}

/**
 * Given a single post, will return the next newest post in the same taxnomy - TODO.
 */
function getnextpost(WPost $wpost)
{
    //
}

function oembed($video_url = '')
{
    $client = new \GuzzleHttp\Client();

    $url = 'https://vimeo.com/api/oembed.json?autoplay=true&url='.$video_url;
    $response = $client->get($url);

    $response_body = json_decode($response->getBody());

    return $response_body->html;
}

function getSetList()
{
    /*$client = new \GuzzleHttp\Client();

    $url = 'https://www.planningcenteronline.com/organization.json';
    $response = $client->get($url);

    $response_body = json_decode($response->getBody());*/

    return null;
}
