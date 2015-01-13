<?php

function chb_feed_smugmug($feedUrl, $num) {
							
	$rawFeed = file_get_contents($feedUrl);
	$xml = new SimpleXmlElement($rawFeed);
	$results = array();

	for ( $i=0; $i<$num; $i++ )
	{
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