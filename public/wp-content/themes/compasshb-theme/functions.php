<?php

/**
 * Load the parent style.css file
 *
 */

define ('YOAST_VIDEO_SITEMAP_BASENAME', 'vsvideo');

function total_child_enqueue_parent_theme_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'compass-bootstrap', '/wp-content/themes/compasshb-theme/bootstrap.css' );
}
add_action( 'wp_enqueue_scripts', 'total_child_enqueue_parent_theme_style' );

/**
 * Customize the login page CSS
 * 
 */

function my_login_css() {
	wp_enqueue_style( 'login-style', get_stylesheet_directory_uri().'/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_css' );

function my_disable_title( $return ) {
        return false;
}
add_filter( 'wpex_display_page_header', 'my_disable_title' );

/**
 * Alter the layout on any page, post, archive.
 * Give all sermons a left sidebar
 *
 */

function my_sermon_sidebar( $sidebar ) {
    // Assign Sermon Sidebar widget to Sermon Posts
    if ( is_post_type_archive('sermon')) {
        return 'sermonsidebar';
    } else { 
        return $sidebar;
    }
}
add_filter( 'wpex_get_sidebar', 'my_sermon_sidebar' );

/*// remove this Custom oEmbed Size
function wpb_oembed_defaults($embed_size) {
if(is_front_page()) {
        $embed_size['width'] = 940;
        $embed_size['height'] = 600;
}
else {
	$embed_size['width'] = 940;
        $embed_size['height'] = 600;
}
    return $embed_size;
}
add_filter('embed_defaults', 'wpb_oembed_defaults');
*/

/*
 * Make header sticky to top. Larger header on homepage
 *
 */

// Add specific CSS class by filter
function my_class_names( $classes ) {
		if (is_page('home')) {
	// add 'class-name' to the $classes array
	$classes[] = 'shrink-fixed-header';
}
	// return the $classes array
	return $classes;
}
add_filter( 'body_class', 'my_class_names' );
	

function compasshb_header_function() {
	if (!wp_is_mobile()) {
		if (is_page('home')) {
			echo '<script> 
				jQuery(document).ready(function(){
				    jQuery("#site-header").sticky({topSpacing:0});
				  });
				</script>';
			echo '<style>#site-logo img {height: 100px}</style>';
		} else {
			echo '<script> 
				jQuery(document).ready(function(){
				    jQuery("#site-header").sticky({topSpacing:0});
				  });
				</script>';
		}		
	}
}
add_action('wp_head', 'compasshb_header_function');

/**
 * Alter the layout on any page, post, archive
 *
 * @link Total/framework/post-layout.php
 */
/*
function my_fullwidth_homepage( $class ) {
    // Make the front-page have a full-width layout
    if ( is_front_page() ) {
        return 'full-width';
    } else { 
        return $class;
    }
}
add_filter( 'wpex_post_layout_class', 'my_fullwidth_homepage' );
// http://wpexplorer-themes.com/total/docs/content-layouts/
*/