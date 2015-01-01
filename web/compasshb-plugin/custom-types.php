<?php

$postTypes = array(
	
	'Article'	=> array( 'menu_icon' => 'dashicons-media-default', 'capability_type' => 'article', 'map_meta_cap' => 'true'),
	'Event'		=> array( 'menu_icon' => 'dashicons-calendar'),
	'Scripture of the Day'		=> array( 'postType' => 'read', 'rewrite' => array('slug' => 'read'), 'name' => 'Scripture of the Day', 'menu_name' => 'Scripture of the Day', 'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments'), 'menu_icon'	=> 'dashicons-admin-plugins', 'capability_type' => 'read', 'map_meta_cap' => 'true'),
	'Series'	=> array( 'menu_icon' => 'dashicons-groups'),
	'Sermon'	=> array( 'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'author' ), 'menu_icon'	=> 'dashicons-microphone'),
	'Video'		=> array( 'menu_icon' => 'dashicons-video-alt3')

);

add_action( 'init', 'chb_register' );

function chb_register () {
	
	global $postTypes;
	
	foreach( $postTypes as $title => $args ) {
    	chb_register_post_type( $title, $args );
	}

}

function chb_register_post_type( $title, $args = array() ) {
    
	$sanitizedTitle = sanitize_title( $title );
    
	$defaults = array(
		'labels' => array(
			'name' => $title . 's',
            'singular_name' => $title,
            'add_new_item' => 'Add New ' . $title,
            'edit_item' => 'Edit ' . $title,
            'new_item' => 'New ' . $title,
            'search_items' => 'Search ' . $title . 's',
            'not_found' => 'No ' . $title . 's found',
            'not_found_in_trash' => 'No ' . $title . 's found in trash'
		),
		'public' => true,
		'hierarchical' => false,
		'taxonomies' => array( ),
		'query_var' => true,
		'menu_position' => 6,
		'supports' => array( 'title', 'editor', 'thumbnail', 'author' ),
		'rewrite' => array( 'slug' => $sanitizedTitle ),
		'has_archive' => true
	);
    
    $args = wp_parse_args( $args, $defaults );
    
    $postType = isset( $args['postType'] ) ? $args['postType'] : $sanitizedTitle;
    
    register_post_type( $postType, $args );
    
}

/* Publish future events */
remove_action( 'future_event', '_future_post_hook', 5, 2 );
add_action( 'future_event', 'my_future_post_hook', 5, 2);

function my_future_post_hook( $deprecated = '', $post ) {
    	wp_publish_post( $post->ID );
}

?>