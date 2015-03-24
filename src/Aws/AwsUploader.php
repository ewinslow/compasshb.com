<?php namespace CompassHB\Aws;

use Aws\S3\S3Client;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AwsUploader implements UploadProvider
{
    private $client;
    private $key;
    private $secret;

    /**
     * Initialize object and authenticate.
     */
    public function __construct()
    {
        $this->key = env('AWS_ACCESS_KEY');
        $this->secret = env('AWS_SECRET_KEY');

        $this->client = S3Client::factory(array(
            'credentials' => array('key' => $this->key, 'secret' => $this->secret),
        ));
    }

    /**
     * Accepts a file from a form upload and
     * saves it to AWS S3 returing the URL.
     *
     * @param  UploadedFile
     * @param  string
     *
     * @return string
     */
    public function uploadAndSaveS3(UploadedFile $file, $folder)
    {
        $response = $this->client->putObject(array(
            'Bucket' => env('AWS_BUCKET'),
            'Key' => $folder.'/'.$file->getClientOriginalName(),
            'SourceFile' => $file->getRealPath(),
            'ContentType' => $file->getClientMimeType(),
            'ACL' => 'public-read',
        ));

        return $response['ObjectURL'];
    }
}
