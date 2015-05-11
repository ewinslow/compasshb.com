<?php namespace CompassHB\Www\Repositories\Calendar;

class GoogleCalendarRepository implements CalendarRepository
{
    private $client;
    private $url = 'https://www.googleapis.com/auth/calendar.readonly';
    private $calendarId;

    public function __construct()
    {
        $this->calendarId = env('GOOGLE_CALENDAR_ID');
        $this->email = getenv('GOOGLE_ANALYTICS_EMAIL');
        $this->client = new \Google_Client();
        $this->client->setApplicationName("Compass HB");

        if (file_exists(storage_path('keys/CompassHB-27e1adae11b5.p12'))) {
            $this->client->setAssertionCredentials(
                new \Google_Auth_AssertionCredentials(
                    $this->email,
                    array($this->url),
                    file_get_contents(storage_path('keys/CompassHB-27e1adae11b5.p12'))
            ));
        }

        $this->client->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->client->setAccessType('offline_access');

        $this->service = new \Google_Service_Calendar($this->client);
    }

    public function test()
    {
        if ($this->calendarId == '') {
            return [];
        }

        // Print the next 10 events on the user's calendar.
        $calendarId = $this->calendarId;
        $optParams = array(
          'maxResults' => 10,
          'orderBy' => 'startTime',
          'singleEvents' => true,
          'timeMin' => date('c'),
        );
        $results = $this->service->events->listEvents($calendarId, $optParams);

        return $results;
    }
}
