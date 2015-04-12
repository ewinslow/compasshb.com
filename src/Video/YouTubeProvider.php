<?php namespace CompassHB\Video;

use Log;

class YouTubeProvider implements VideoInterface
{
    private $client;
    private $domain = 'youtube.com';
    private $domain2 = 'youtu.be';

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function recognizes($url)
    {
        return (strpos($url, $this->domain) != false || strpos($url, $this->domain2) != false);
    }

    /**
     * Get oembed iframe.
     *
     * @param string $url location of video
     *
     * @return string
     */
    public function getEmbedCode($url)
    {
        $request = 'https://www.youtube.com/oembed?url='.$url;

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
    public function getThumbnail($url, $large = false)
    {
        if ($url == '') {
            return;
        }

        $request = 'https://www.youtube.com/oembed?url='.$url;

        try {
            $response = $this->client->get($request);
        } catch (\Exception $e) {
            Log::warning('Connection refused to youtube.com');

            return;
        }

        $response_body = json_decode($response->getBody());

        return $response_body->thumbnail_url;
    }

    public function getDownloadLink($url)
    {
        return $url;
    }
}
