<?php namespace CompassHB\Video;

interface VideoProvider
{
    public function oembed($url);
    public function getOThumb($url);
    public function getVideoThumb($url);
}
