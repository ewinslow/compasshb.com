<?php namespace CompassHB\Smugmug;

class Smugmug implements PhotosProvider
{
    private $url = 'http://photos.compasshb.com/hack/feed.mg?Type=nicknameRecentPhotos&Data=compasshb&format=rss200&Size=Medium';

    public function __construct()
    {
    }

    /**
     * Shows most recent photos on /photos page.
     *
     * @return array
     */
    public function getRecentPhotos()
    {
        // Smugmug
        $feedUrl = $this->url;
        $num = 40;

        $rawFeed = file_get_contents($feedUrl);
        $xml = new \SimpleXmlElement($rawFeed);
        $results = array();

        for ($i = 0; $i < $num; $i++) {
            // Parse Image Link
                $link = $xml->channel->item->link;
            $link = substr($link->asXML(), 6, -7);

                // Parse Image Source
                $namespaces = $xml->channel->item[$i]->getNameSpaces(true);
            $media = $xml->channel->item[$i]->children($namespaces['media']);
            $image = $media->group->content[3]->attributes();
            $image = $image['url']->asXML();
            $image = substr($image, 6, -1);

            $results[] = array($link, $image);
        }

        return $results;
    }

    public function getPhotos($number)
    {
        // Smugmug
        $feedUrl = 'http://photos.compasshb.com/hack/feed.mg?Type=nicknameRecentPhotos&Data=compasshb&format=rss200&Size=Medium';
        $num = 4;

        $rawFeed = file_get_contents($feedUrl);
        $xml = new \SimpleXmlElement($rawFeed);
        $results = array();

        for ($i = 0; $i < $num; $i++) {
            // Parse Image Link
            $link = $xml->channel->item->link;
            $link = substr($link->asXML(), 6, -7);

            // Parse Image Source
            $namespaces = $xml->channel->item[$i]->getNameSpaces(true);
            $media = $xml->channel->item[$i]->children($namespaces['media']);
            $image = $media->group->content[3]->attributes();
            $image = $image['url']->asXML();
            $image = substr($image, 6, -1);

            $results[] = array($link, $image);
        }

        return $results;
    }
}
