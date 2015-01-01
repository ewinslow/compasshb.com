<?php

/**
 * Visual Composer Extension for Homepage Video
 *
 */

function compasshb_hero_func($atts, $content = null) {
	
	// Parse attributes
	$a = shortcode_atts( array(
        'video_url' => 'empty',
    ), $atts );

	ob_start();
	vcex_compasshb_hero($a); 
	return ob_get_clean();
}

add_shortcode( 'compasshb_hero', 'compasshb_hero_func' );


/**
 * HTML output of the compasshb shortcode for oembed
 */
function vcex_compasshb_hero($a) {
	
	if ($a["video_url"] == "empty") {
		
		// Display most recent sermon video
		$args = array (
			'post_type'			=>	'sermon',
			'posts_per_page'	=>	20,
		);
		query_posts($args);
		while ( have_posts() ) : the_post();
			if (get_field('video_oembed')) {
				$worksheet = get_field("sermon_worksheet");
				echo "<center>";
				if (wp_is_mobile()) {
					echo wp_oembed_get(get_field('video_oembed'), array('height' => '205'));
				} else {
					echo wp_oembed_get(get_field('video_oembed'), array('height' => '500'));

				}
				echo "</center>";
				echo '<div class="vc_text_separator wpb_content_element separator_align_center vc_text_separator_one" ><span  style="color: #ffffff;">Latest Sermon: ';
				echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
				if ($worksheet) {
					echo ' - <a href="' . $worksheet['url'] . '" target="_blank">Download Worksheet</a>';
					echo ' - <a href="https://itunes.apple.com/us/podcast/sermon-video/id938965423?mt=2">Download Video</a>';
				}
				echo '</span></div>';
				break;
			}
		endwhile;
		
	} else {
		
		// Display specific video
		echo wp_oembed_get($a['force_video_url'], array('width'=>640));
	}
	
	return; 
} ?>