<?php namespace CompassHB\Www\Repositories\Video;

interface VideoRepository
{
    /**
     * Set the URL to the video page.
     *
     * @param string $url
     */
    public function setUrl($url);

    /**
     * The embed code in HTML.
     *
     * @param string $url
     *
     * @return string
     */
    public function getEmbedCode();

    /**
     * The link to cover image.
     *
     * @param string  $url
     * @param boolean $large returns default thumbnail from the ombed call
     *                       Set this to true if there is another way to grab a high resolution thumbnail
     *
     * @return string
     */
    public function getThumbnail($large = false);

    public function getDownloadLink();
}
