<?php namespace CompassHB\Www\Repositories\Video;

use Log;
use Cache;

class VimeoVideoRepository implements VideoRepository
{
    private $url;
    private $vimeoClient;
    private $client;
    private $clientId;
    private $clientSecret;
    private $token;
    private $domain = 'vimeo.com';

    public function __construct()
    {
        $this->clientId = env('VIMEO_CLIENT_ID');
        $this->clientSecret = env('VIMEO_CLIENT_SECRET');
        $this->token = env('VIMEO_TOKEN');

        $this->vimeoClient = new \Vimeo\Vimeo($this->clientId, $this->clientSecret, $this->token);
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
    public function getEmbedCode()
    {
        $request = 'https://vimeo.com/api/oembed.json?autoplay=false&url='.$this->url;

        try {
            $response = $this->client->get($request);
        } catch (\Exception $e) {
            Log::warning('Connection refused to vimeo.com');

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

        if ($large) {
            return $this->getVideoThumb($this->url);
        }

        $request = 'https://vimeo.com/api/oembed.json?url='.$this->url;

        try {
            $response = $this->client->get($request);
        } catch (\Exception $e) {
            Log::warning('Connection refused to vimeo.com');

            return;
        }

        $response_body = json_decode($response->getBody());

        Cache::add($this->url, $response_body->thumbnail_url, '1440');

        return $response_body->thumbnail_url;
    }

    /**
     * Returns the largest thumbnail from a video from Vimeo
     * to display on the homepage banner.
     *
     * @param string $url
     *
     * @return string
     */
    private function getVideoThumb()
    {
        // Parse Vimeo video ID
        $videoId = substr($this->url, strrpos($this->url, '/') + 1);

        try {
            $video = $this->vimeoClient->request("/videos/$videoId");

            if ($video['status'] == '404' || $video['status'] == '400') {
                return;
            }
        } catch (VimeoUploadException $e) {
            return;
        }

        // Get the video thumbnail
        if (!isset($video['body']['error']) &&
            $video['body'] != null &&
            isset(end($video['body']['pictures']['sizes'])['link'])) {
            return end($video['body']['pictures']['sizes'])['link'];
        }

        return;
    }

    /**
     * Link to download Vimeo video.
     *
     * @param string $videoUrl
     *
     * @return string
     */
    public function getDownloadLink()
    {
        $link = '';

        $id = substr($this->url, strrpos($this->url, '/') + 1);

        $video = $this->vimeoClient->request("/videos/$id");

        if ($video['status'] == '200') {
            $link = $video['body'];
            $link = $link['download'];
            $link = $link[1];
            $link = $link['link'];
        }

        return $link;
    }
}
