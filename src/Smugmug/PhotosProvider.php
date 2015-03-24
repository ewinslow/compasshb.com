<?php namespace CompassHB\Smugmug;

interface PhotosProvider
{
    public function getRecentPhotos();
    public function getPhotos($number);
}
