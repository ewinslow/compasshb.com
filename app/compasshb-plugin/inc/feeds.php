<?php

/* Adds video link to podcast feed to create enclosures on feed.press */

function addToFeed ($content) {
	global $post;

	// Video Podcasts
   	if (is_feed() && get_field('video_oembed') != "") {
   		$content = '<a href="'. get_the_permalink() . 'podcast/' . 
					substr(get_field('video_oembed'), strrpos(get_field('video_oembed'), '/') + 1) . '.mp4">' . 
					get_field('sermon_text') . '</a> - ' . get_the_author() . ' - ' . 
					get_post_meta($post->ID, '_yoast_wpseo_metadesc', true) . ' ';
	}
	// Scripture of the Day Podcast
	elseif (is_feed() && get_post_type($post->ID) == 'read') {
		$esv_content = sotd(get_the_title(), 'mp3');
		$start = strrpos($esv_content, 'http://stream.esvmedia.org');
		$end = strrpos($esv_content, '">Listen</a>');
		$length = $end - $start;
		$content = '<a href="' . substr($esv_content, $start, $length) . '.mp3">Listen</a>' . $esv_content;
	}	
	return $content;
}

add_filter('the_content', 'addToFeed', 99);

/*
 * Download ('/podcast') endpoint
 * For downloading Vimeo videos
 */ 

add_action( 'init', 'compasshb_rewrite_add_rewrites' );

// Define the endpont
function compasshb_rewrite_add_rewrites() {
	add_rewrite_endpoint( 'podcast', EP_PERMALINK );
}


add_action( 'template_redirect', 'compasshb_rewrite_catch_form' );

// Handle the endpoint

function compasshb_rewrite_catch_form() {
	if( is_singular() && get_query_var( 'podcast' ) && get_post_type() == 'sermon' ) {
		$post = get_queried_object();
		$video_field = get_field('video_oembed', $post->ID);
		$video_field = substr($video_field, strrpos($video_field, '/') + 1);
		$video_id = get_query_var('podcast');
		if (substr($video_id, -4, 4) == '.mp4') {
			$video_id = substr($video_id, 0, -4);
			
			// Create your API App (developer.vimeo.com/apps), place the data here
			$vimeo = new \Vimeo\Vimeo(getenv('VIMEO_CLIENT_ID'), getenv('VIMEO_CLIENT_SECRET'), getenv('VIMEO_TOKEN'));
			// Define from which video you want to pull data and make the request
			$video = $vimeo->request("/videos/$video_field");
			$video = $video['body'];
			$video = $video['download'];
			$video = $video[1];
			$video = $video['link'];

			if ($video) {
				wp_redirect( $video, '302');
			} else {
				wp_redirect( home_url() );
			}			
			
		} else {
			wp_redirect( home_url() );
		}
		exit();
	}
}

// Include the thumbnail as hidden image when using oembed
// http://vimeo.com/api/oembed.xml?url=http%3A//vimeo.com/114506444
add_filter('oembed_dataparse', 'compasshb_oembed_filter', 10, 3);

function compasshb_oembed_filter ( $return, $data, $url ) {
	$return .= '<img src="' . $data->thumbnail_url . '" style="display: none" alt="' . htmlspecialchars($data->title) . '"/>';
	return $return;
}