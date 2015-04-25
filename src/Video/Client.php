<?php namespace CompassHB\Video;

class Client
{
    private $url;
    private $client;
    private $providers = [
        VimeoProvider::class,
        YouTubeProvider::class,
        NullProvider::class,
    ];

    public function __construct($url)
    {
        $this->url = $url;

        /*
    	 * Determine which provider can handle the URL
    	 */
        foreach ($this->providers as $provider) {
            $temp = new $provider();
            if ($temp->recognizes($url)) {
                $this->client = $temp;
                break;
            }
        }
    }

    public function getEmbedCode()
    {
        return $this->client->getEmbedCode($this->url);
    }

    public function getThumbnail($large = false)
    {
        return $this->client->getThumbnail($this->url, $large);
    }

    public function getDownloadLink()
    {
        return $this->client->getDownloadlink($this->url);
    }
}
