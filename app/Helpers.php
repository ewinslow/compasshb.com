<?php

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
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
 * Service for Planning Center API.
 *
 * @return array
 */
function last_weeks_set_list()
{
    $client = new Client([
        'base_url' => 'https://services.planningcenteronline.com/',
        'defaults' => ['auth' => 'oauth'],
    ]);

    $oauth = new Oauth1([
        'consumer_key'    => env('PLANNINGCENTER_CONSUMER_KEY'),
        'consumer_secret' => env('PLANNINGCENTER_CONSUMER_SECRET'),
        'token'           => env('PLANNINGCENTER_TOKEN_KEY'),
        'token_secret'    => env('PLANNINGCENTER_TOKEN_SECRET'),
    ]);

    $client->getEmitter()->attach($oauth);

    // Get Service ID for Weekend Service
    $res = $client->get('organization.json');
    $res =  json_decode($res->getBody());
    $service = $res->service_types[1]->id;

    // Get Plans for all services
    $res = $client->get('service_types/'.$service.' /plans.json?all=true');
    $res =  json_decode($res->getBody());
    $plans = $res;

    // Get Plan ID for most recent service
    foreach (array_reverse($plans) as $plan) {
        $plandate = \Carbon\Carbon::parse($plan->dates);
        $now = \Carbon\Carbon::now();

        if ($plandate->lt($now)) {
            $planid = $plan->id;
            break;
        }
    }

    // Get specific items from last weekend service
    $res = $client->get('plans/'.$planid.'.json');
    $res =  json_decode($res->getBody());
    $items = $res->items;
    $setlist = [];

    foreach ($items as $item) {
        // Only interested in songs
        if ($item->type == 'PlanSong') {
            $tmp = [];
            $tmp['title'] = $item->song->title;
            $tmp['author'] = $item->song->author;
            $tmp['date'] = $plandate;

            // Add remote link to song if exists
            foreach ($item->attachments as $attachment) {
                if (isset($attachment->link)) {
                    $tmp['link'] = $attachment->link;
                }
                if (isset($attachment->public_url)) {
                    $tmp['link'] = $attachment->public_url;
                }
            }

            $setlist[] = $tmp;
        }
    }

    return $setlist;
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
