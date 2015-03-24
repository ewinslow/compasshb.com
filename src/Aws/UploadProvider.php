<?php namespace CompassHB\Aws;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface UploadProvider
{
    public function uploadAndSaveS3(UploadedFile $file, $folder);
}
