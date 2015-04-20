<?php namespace CompassHB\Photo;

interface PhotoInterface
{
    public function getRecentPhotos();
    public function getPhotos($number);
}
