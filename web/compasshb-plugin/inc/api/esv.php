<?php

/**
 * Grab passage using the ESV API
 *
 */

function sotd($p, $f = 'flash') {
	
	$key = getenv('ESV_API');
	$options = "include-footnotes=false&audio-format=" . $f;
  	$passage = urlencode($p);

  	$url = "http://www.esvapi.org/v2/rest/passageQuery?key=$key&passage=$passage&$options";

  	$ch = curl_init($url); 
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  	$response = curl_exec($ch);
  	curl_close($ch);
  	return $response;

}