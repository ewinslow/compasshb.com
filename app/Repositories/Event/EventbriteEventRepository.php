<?php namespace CompassHB\Www\Repositories\Event;

use Cache;
use GuzzleHttp\Client;

class EventbriteEventRepository implements EventRepository
{
    private $minutes = 2880;
    private $client;
    private $url = 'https://www.eventbriteapi.com/v3/';

    public function __construct()
    {
        $this->client = new Client([
            'base_url' => $this->url,
        ]);
    }

    /**
     * List of events matching search term.
     *
     * @param string $query
     */
    public function search($query)
    {
        $res = Cache::remember('searchevent', $this->minutes, function () use ($query) {
            $res = $this->client->get('events/search/?q='.urlencode($query).'&token='.env('EVENTBRITE_OAUTH_TOKEN'));

            return json_decode($res->getBody());
        });

        return $res;
    }

    /**
     * List of multiple events.
     */
    public function events()
    {
        $res = Cache::remember('events', $this->minutes, function () {
            $res = $this->client->get('users/me/owned_events/?status=live%2Cstarted&order_by=start_asc&token='.env('EVENTBRITE_OAUTH_TOKEN'));

            return json_decode($res->getBody());
        });

        return $res;
    }

    /**
     * Single event details.
     *
     * @param string $id
     */
    public function event($id)
    {
        $res = Cache::remember($id, $this->minutes, function () use ($id) {
            $res = $this->client->get('events/'.$id.'/?token='.env('EVENTBRITE_OAUTH_TOKEN'));

            return json_decode($res->getBody());
        });

        return $res;
    }
}
