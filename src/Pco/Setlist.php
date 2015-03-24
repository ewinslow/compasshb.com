<?php namespace CompassHB\Pco;

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

interface SongsProvider
{
    public function getSetList();
}

/**
 * Service for Planning Center API.
 *
 * @todo : exception handling
 */
class Setlist implements SongsProvider
{
    private $url = 'https://services.planningcenteronline.com/';
    private $consumer_key;
    private $consumer_secret;
    private $token;
    private $token_secret;

    public function __construct()
    {
        $this->token = env('PLANNINGCENTER_TOKEN_KEY');
        $this->token_secret = env('PLANNINGCENTER_TOKEN_SECRET');
        $this->consumer_key = env('PLANNINGCENTER_CONSUMER_KEY');
        $this->consumer_secret = env('PLANNINGCENTER_CONSUMER_SECRET');
    }

    /**
     * Get last week setlist.
     *
     * @return array
     */
    public function getSetList()
    {
        $planid = '';
        $plandate = '';
        $client = new Client([
            'base_url' => $this->url,
            'defaults' => ['auth' => 'oauth'],
        ]);

        $oauth = new Oauth1([
            'consumer_key'    => $this->consumer_key,
            'consumer_secret' => $this->consumer_secret,
            'token'           => $this->token,
            'token_secret'    => $this->token_secret,
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
}
