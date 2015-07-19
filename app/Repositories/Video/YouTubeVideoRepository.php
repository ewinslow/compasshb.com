<?php

namespace CompassHB\Www\Repositories\Video;

use Log;
use Cache;

class YouTubeVideoRepository implements VideoRepository
{
    private $url;
    private $client;
    private $domain = 'youtube.com';
    private $domain2 = 'youtu.be';

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * Set the video url.
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get oembed iframe.
     *
     * @param string $url location of video
     *
     * @return string
     */
    public function getEmbedCode($api = false)
    {
        $request = 'https://www.youtube.com/oembed?url='.$this->url;

        try {
            $response = $this->client->get($request);
        } catch (\Exception $e) {
            Log::warning('Connection refused to youtube.com');

            return;
        }

        $response_body = json_decode($response->getBody());

        return $response_body->html;
    }

    /**
     * Make an oembed request and return the thumbnail.
     *
     * @param string $url
     *
     * @return string
     */
    public function getThumbnail($large = false)
    {
        if ($this->url == '') {
            return;
        }

        if (Cache::has($this->url)) {
            return Cache::get($this->url);
        }

        $request = 'https://www.youtube.com/oembed?url='.$this->url;

        try {
            $response = $this->client->get($request);
        } catch (\Exception $e) {
            Log::warning('Connection refused to youtube.com');

            return;
        }

        $response_body = json_decode($response->getBody());

        Cache::add($this->url, $response_body->thumbnail_url, '1440');

        return $response_body->thumbnail_url;
    }

    public function getDownloadLink()
    {
        return $this->url;
    }

    public function getTextTracks($parse = false)
    {
        return 0;
    }
}
