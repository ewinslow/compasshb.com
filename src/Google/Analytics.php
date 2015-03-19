<?php namespace CompassHB\Google;

interface AnalyticsProvider
{
    public function getPageViews($path, $startDate, $endDate);
}

class Analytics implements AnalyticsProvider
{
    private $email;
    private $url = "http://www.esvapi.org/v2/rest/passageQuery";

    public function __construct()
    {
        $this->email = getenv('GOOGLE_ANALYTICS_EMAIL');
    }

    public function getPageViews($path, $startDate, $endDate)
    {
        session_start();
        $client = new \Google_Client();
        $client->setApplicationName("Compass HB");

        $client->setAssertionCredentials(
            new \Google_Auth_AssertionCredentials(
                $this->email,
                array('https://www.googleapis.com/auth/analytics.readonly'),
                file_get_contents(storage_path('keys/CompassHB-27e1adae11b5.p12'))
        ));

        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setAccessType('offline_access'); // unnecessary?

        $service = new \Google_Service_Analytics($client);

        $optParams = array(
            'dimensions' => 'ga:source,ga:keyword',
            'sort' => '-ga:sessions,ga:source',
            'filters' => 'ga:pagePath=='.$path,
            'max-results' => '25',
        );

        try {
            $results = $service->data_ga->get(
                'ga:89284462',
                $startDate,
                $endDate,
                'ga:sessions,ga:avgSessionDuration',
                $optParams
            );
        } catch (apiServiceException $e) {
            $error = $e->getMessage();
        }

        return array(
            'sessions' => $results->totalsForAllResults['ga:sessions'],
            'avgSessionDuration' => round($results->totalsForAllResults['ga:avgSessionDuration'] / 60, 2),
        );
    }
}
