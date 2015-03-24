<?php namespace CompassHB\Esv;

class Esv implements ScriptureProvider
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
        curl_close($ch);

        return $response;
    }
}