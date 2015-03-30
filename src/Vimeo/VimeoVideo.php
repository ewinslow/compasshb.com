<?php namespace CompassHB\Vimeo;

use Log;

class VimeoVideo implements VideoProvider
{
    private $vimeoClient;
    private $client;
    private $clientId;
    private $clientSecret;
    private $token;

    public function __construct()
    {
        $this->clientId = env('VIMEO_CLIENT_ID');
        $this->clientSecret = env('VIMEO_CLIENT_SECRET');
        $this->token = env('VIMEO_TOKEN');

        $this->vimeoClient = new \Vimeo\Vimeo($this->clientId, $this->clientSecret, $this->token);
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * Get oembed iframe.
     *
     * @param string $url location of video
     *
     * @return string
     */
    public function oembed($url)
    {
        $request = 'https://vimeo.com/api/oembed.json?autoplay=true&url='.$url;

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
    public function getOThumb($url)
    {
        if ($url == '') {
            return;
        }

        $request = 'https://vimeo.com/api/oembed.json?url='.$url;

        try {
            $response = $this->client->get($request);
        } catch (\Exception $e) {
            Log::warning('Connection refused to vimeo.com');

            return;
        }

        $response_body = json_decode($response->getBody());

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
    public function getVideoThumb($url)
    {
        // Parse Vimeo video ID
        $videoId = substr($url, strrpos($url, '/') + 1);

        try {
            $video = $this->vimeoClient->request("/videos/$videoId");

            if ($video['status'] == '404' || $video['status'] == '400') {
                return;
            }
        } catch (VimeoUploadException $e) {
            return;
        }

        // Get the video thumbnail
        if (isset(end($video['body']['pictures']['sizes'])['link'])) {
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
    public function getDownloadLink($videoUrl)
    {
        $id = substr($videoUrl, strrpos($videoUrl, '/') + 1);

        $video = $this->vimeoClient->request("/videos/$id");
        $video = $video['body'];
        $video = $video['download'];
        $video = $video[1];
        $video = $video['link'];

        return $video;
    }
}
