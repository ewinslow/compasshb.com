<?php namespace CompassHB\Www\Repositories\Scripture;

use Log;

class EsvScriptureRepository implements ScriptureRepository
{
    private $apikey;
    private $options = "include-footnotes=false&audio-format=mp3";
    private $url = "http://www.esvapi.org/v2/rest/passageQuery";

    public function __construct()
    {
        $this->apikey = env('ESV_API');
    }

    public function getScripture($passage)
    {
        $request = $this->url."?key=".$this->apikey."&passage=".urlencode($passage)."&".$this->options;

        $ch = curl_init($request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        /* Check for 404 (file not found). */
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode == 404) {
            Log::warning('Connection refused to  www.esvapi.org');

            $response = 'Connection error: www.esvapi.org. Please try again.';
        }

        curl_close($ch);

        return $response;
    }
}
