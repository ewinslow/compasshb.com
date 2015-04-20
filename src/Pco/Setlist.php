<?php namespace CompassHB\Pco;

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

/**
 * Service for Planning Center API.
 *
 * @todo : exception handling
 */
class Setlist implements ServiceInterface
{
    private $url = 'https://services.planningcenteronline.com/';
    private $consumerKey;
    private $consumerSecret;
    private $token;
    private $tokenSecret;

    public function __construct()
    {
        $this->token = env('PLANNINGCENTER_TOKEN_KEY');
        $this->tokenSecret = env('PLANNINGCENTER_TOKEN_SECRET');
        $this->consumerKey = env('PLANNINGCENTER_CONSUMER_KEY');
        $this->consumerSecret = env('PLANNINGCENTER_CONSUMER_SECRET');
    }

    /**
     * Get last week setlist.
     *
     * @return array
     */
    public function getSetList()
    {
        $setlist = [];
        $setlist[0]['date'] = '';
        $setlist[0]['title'] = '';
        $setlist[0]['author'] = '';

        $planId = '';
        $planDate = '';
        $client = new Client([
            'base_url' => $this->url,
            'defaults' => ['auth' => 'oauth'],
        ]);

        if (!isset($this->consumerKey)) {
            return $setlist;
        }

        $oauth = new Oauth1([
            'consumer_key'    => $this->consumerKey,
            'consumer_secret' => $this->consumerSecret,
            'token'           => $this->token,
            'token_secret'    => $this->tokenSecret,
        ]);

        $client->getEmitter()->attach($oauth);

        // Get Service ID for Weekend Service
        $res = $client->get('organization.json');

        $res = json_decode($res->getBody());
        $service = $res->service_types[1]->id;

        // Get Plans for all services
        $res = $client->get('service_types/'.$service.' /plans.json?all=true');
        $res = json_decode($res->getBody());
        $plans = $res;

        // Get Plan ID for most recent service
        foreach (array_reverse($plans) as $plan) {
            $planDate = \Carbon\Carbon::parse($plan->dates);
            $now = \Carbon\Carbon::now();

            if ($planDate->lt($now)) {
                $planId = $plan->id;
                break;
            }
        }

        // Get specific items from last weekend service
        $res = $client->get('plans/'.$planId.'.json');
        $res = json_decode($res->getBody());
        $items = $res->items;

        foreach ($items as $item) {
            // Only interested in songs
            if ($item->type == 'PlanSong') {
                $tmp = [];
                $tmp['title'] = $item->song->title;
                $tmp['author'] = $item->song->author;
                $tmp['date'] = $planDate;

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
