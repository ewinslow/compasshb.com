<?php

/*
 * Wrapper for Vimeo API
 *
 */

require_once (plugin_dir_path( __FILE__ ) . '../../lib/vimeo.php/autoload.php');

function get_vimeo_thumb($video_field) {
	
	$video_field = substr($video_field, strrpos($video_field, '/') + 1);
	
	// Create your API App (developer.vimeo.com/apps), place the data here
	$vimeo_t = new \Vimeo\Vimeo(getenv('VIMEO_CLIENT_ID'), getenv('VIMEO_CLIENT_SECRET'), getenv('VIMEO_TOKEN'));							
						
	// Define from which video you want to pull data and make the request
	$video = $vimeo_t->request("/videos/$video_field");
	
	// Get the video thumbnail
	$video_thumb = $video['body'];
	$video_thumb = $video_thumb['pictures'];
	$video_thumb = $video_thumb['sizes'];
	$video_thumb = $video_thumb[3];
	$video_thumb = $video_thumb['link'];
	
	return array ( $video_thumb );
}