<?php

add_action( 'init', 'ctx_class' );

function ctx_class() {

  	$labels = array(
    	'name' => _x( 'Classroom', 'taxonomy general name' ),
    	'singular_name' => _x( 'Class', 'taxonomy singular name' ),
    	'search_items' =>  __( 'Search Classes' ),
    	'all_items' => __( 'All Classes' ),
    	'parent_item_colon' => __( '' ),
    	'edit_item' => __( 'Edit Class' ), 
    	'update_item' => __( 'Update Class' ),
    	'add_new_item' => __( 'Add New Class' ),
    	'new_item_name' => __( 'New Class' ),
    	'menu_name' => __( 'Classrooms' ),
  	); 	

  	register_taxonomy('class', array('series', 'sermon'), array(
    	'labels' => $labels,
    	'show_ui' => true,
		'meta_box_cb' => 'my_admin_taxonomy_select_meta_box',
    	'show_admin_column' => true,
    	'query_var' => true,
    	'rewrite' => array( 
			'slug' => 'class'
		),
		'capabilities' => array(
			'manage_terms' => 'edit_users', // Using 'edit_users' cap to keep this simple.
			'edit_terms'   => 'edit_users',
			'delete_terms' => 'edit_users',
			'assign_terms' => 'read',
		),
  	));

}

add_action( 'init', 'ctx_scripture' );

function ctx_scripture() {

  	$labels = array(
    	'name' => _x( 'Scripture', 'taxonomy general name' ),
    	'singular_name' => _x( 'Scripture', 'taxonomy singular name' ),
    	'search_items' =>  __( 'Search Scripture' ),
    	'all_items' => __( 'All Scripture' ),
    	'parent_item_colon' => __( '' ),
    	'edit_item' => __( 'Edit Scripture' ), 
    	'update_item' => __( 'Update Scripture' ),
    	'add_new_item' => __( 'Add New Scripture' ),
    	'new_item_name' => __( 'New Scripture' ),
    	'menu_name' => __( 'Scripture' ),
  	); 	

  	register_taxonomy('scripture', array('article', 'sermon', 'read'), array(
		'hierarchical' => true,
    	'labels' => $labels,
    	'show_ui' => false, // hide from admin
    	'query_var' => true,
    	'rewrite' => array( 
			'slug' => 'scripture',
			'hierarchical' => true,
		),
		'capabilities' => array(
			'manage_terms' => 'edit_users', // Using 'edit_users' cap to keep this simple.
			'edit_terms'   => 'edit_users',
			'delete_terms' => 'edit_users',
			'assign_terms' => 'read',
		),
  	));

}

?>