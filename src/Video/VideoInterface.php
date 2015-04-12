<?php namespace CompassHB\Video;

interface VideoInterface
{
    /**
     * Says if this provider works with the url.
     *
     * @param string $url
     *
     * @return boolean
     */
    public function recognizes($url);

    /**
     * The embed code in HTML.
     *
     * @param string $url
     *
     * @return string
     */
    public function getEmbedCode($url);

    /**
     * The link to cover image.
     *
     * @param string  $url
     * @param boolean $large returns default thumbnail from the ombed call
     *                       Set this to true if there is another way to grab a high resolution thumbnail
     *
     * @return string
     */
    public function getThumbnail($url, $large = false);

    public function getDownloadLink($url);
}
