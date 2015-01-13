<?php

/* Custom Columns */
add_filter('manage_read_posts_columns' , 'cpt_read_columns');

function cpt_read_columns($columns) {

	$new_columns = array(
		'Featured Image' => 'Featured Image',
		'Posted By'		 => 'Posted By',
	);

    return array_merge($columns, $new_columns);

}

add_filter('manage_series_posts_columns' , 'cpt_series_columns');

function cpt_series_columns($columns) {

	$new_columns = array(
		'Count' => 'Count',
		'Featured Image' => 'Featured Image',
	);

    return array_merge($columns, $new_columns);

}

add_filter('manage_sermon_posts_columns' , 'cpt_sermon_columns');

function cpt_sermon_columns($columns) {

	$new_columns = array(
		'Sermon Number' => '#',
		'Series' => 'Series',
		'Worksheet' => 'Worksheet',
		'Video' => 'Video',
		'Transcript' => 'Transcript',
		'Thumbnail'	=> 'Thumbnail',
	);

    return array_merge($columns, $new_columns);

}

add_filter('manage_video_posts_columns' , 'cpt_video_columns');

function cpt_video_columns($columns) {

	$new_columns = array(
		'Video' => 'Video',
		'Description' => 'Description',
	);

    return array_merge($columns, $new_columns);

}

/* Remove SEO columns */
add_filter( 'manage_edit-video_columns', 'my_columns_filter',10, 1 );
add_filter( 'manage_edit-sermon_columns', 'my_columns_filter',10, 1 );
add_filter( 'manage_edit-series_columns', 'my_columns_filter',10, 1 );
add_filter( 'manage_edit-article_columns', 'my_columns_filter',10, 1 );
add_filter( 'manage_edit-event_columns', 'my_columns_filter',10, 1 );
add_filter( 'manage_edit-page_columns', 'my_columns_filter',10, 1 );

function my_columns_filter( $columns ) {
	
   	unset($columns['wpseo-title']);
   	unset($columns['wpseo-metadesc']);
   	unset($columns['wpseo-focuskw']);

   	return $columns;
}

/* Custom Columns */
add_action( 'manage_posts_custom_column' , 'custom_columns', 10, 2 );

function custom_columns( $column, $post_id ) {
    switch ( $column ) {
		case 'Series':
			$series = get_field('sermon_series');
			echo $series[0]->post_title;
			break;
		case 'Video':
	    	if (get_post_meta( $post_id , 'video_oembed' , true )) {
				echo '<div title="OK" class="wpseo-score-icon good"></div>';
			} else {
					if (get_post_status($post_id) == "future") {
						echo '<div title="OK" class="wpseo-score-icon na"></div>';					
					} else {
						echo '<div title="OK" class="wpseo-score-icon bad"></div>';
					}
			}
			break;
		case 'Worksheet':
    		if (get_post_meta( $post_id , 'sermon_worksheet' , true )) {
				echo '<div title="OK" class="wpseo-score-icon good"></div>';
			} else {
				if (get_post_status($post_id) == "future") {
					echo '<div title="OK" class="wpseo-score-icon na"></div>';					
				} else {
					echo '<div title="OK" class="wpseo-score-icon bad"></div>';
				}
			}
			break;
		case 'Transcript':
			if (get_post($post_id)->post_content == "") {
				if (get_post_status($post_id) == "future") {
					echo '<div title="OK" class="wpseo-score-icon na"></div>';					
				} else {
					echo '<div title="OK" class="wpseo-score-icon bad"></div>';
				}
			} else {
				if (strlen(get_post($post_id)->post_content) < 500) {
					echo '<div title="OK" class="wpseo-score-icon ok"></div>';
				} else {
					echo '<div title="OK" class="wpseo-score-icon good"></div>';
				}
			}
			break;
		case 'Description':
			if (get_post($post_id)->post_content == "") {
				if (get_post_status($post_id) == "future") {
					echo '<div title="OK" class="wpseo-score-icon na"></div>';					
				} else {
					echo '<div title="OK" class="wpseo-score-icon bad"></div>';
				}
			} else {
				if (strlen(get_post($post_id)->post_content) < 144) {
					echo '<div title="OK" class="wpseo-score-icon ok"></div>';
				} else {
					echo '<div title="OK" class="wpseo-score-icon good"></div>';
				}
			}
			break;
		case 'Count':
			$count = get_posts(array(
				'post_type' => 'sermon',
				'meta_query' => array(
					array(
					'key' => 'sermon_series', // name of custom field
					'value' => '"' . $post_id . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
					'compare' => 'LIKE'
					)
				)
			));
			echo count($count);
			break;
		case 'Featured Image':
			echo get_the_post_thumbnail($post_id, array(75,75));
			break;
		case 'Sermon Number':
			echo get_field('sermon_number');
			break;
		case 'Posted By':
			echo get_the_author();
			break;
		case 'Thumbnail':
			$video_thumb = implode(get_vimeo_thumb(get_field('video_oembed', $post_id)));
			echo '<img width="100" src="' . $video_thumb . '" />';
			break;
    }
}

?>