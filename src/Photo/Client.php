<?php namespace CompassHB\Photo;

class Client
{
    private $client;

    public function __construct()
    {
        $this->client = new SmugmugProvider();
    }

    public function getRecentPhotos()
    {
        return $this->client->getRecentPhotos();
    }

    public function getPhotos($number)
    {
        return $this->client->getPhotos($number);
    }
}
