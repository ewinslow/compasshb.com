<?php namespace CompassHB\Aws;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface UploadInterface
{
    public function uploadAndSaveS3(UploadedFile $file, $folder);
}
