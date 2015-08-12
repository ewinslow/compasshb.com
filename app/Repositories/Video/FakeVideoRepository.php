<?php

namespace CompassHB\Www\Repositories\Video;

class FakeVideoRepository implements VideoRepository
{
    public function setUrl($url)
    {
    }

    public function getEmbedCode($api = false)
    {
        return '';
    }

    public function getThumbnail($large = false)
    {
        return '';
    }

    public function getDownloadLink()
    {
        return '';
    }

    public function getTextTracks($parse = false, $language = 'en')
    {
        return;
    }

    public function getLanguages()
    {
        return;
    }

    public function getVideoPlays()
    {
        return;
    }
}
