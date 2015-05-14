<?php namespace CompassHB\Www\Repositories\Calendar;

use CompassHB\Ccb\Api;

class CcbCalendarRepository implements CalendarRepository
{
    private $church = "compassbiblechurch";
    private $client;

    public function __construct()
    {
        $guzzle = new \GuzzleHttp\Client([
            'defaults' => [
                'auth' => [
                    env('CCB_USER'),
                    env('CCB_PASSWORD'),
                ],
            ],
        ]);

        $this->client = new Api($this->church, $guzzle);
    }

    public function test()
    {
        // $events = $this->client->srv('GET', 'event_profiles');

        $args['query'] = ['date_start' => '2000-01-01'];
        $events = $this->client->srv('GET', 'public_calendar_listing', $args);

        return $events;
    }
}
