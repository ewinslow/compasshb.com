<?php
/**
 * Plugin Name: Compass HB Plugin
 * Plugin URI: #
 * Description: Site specific plugin for compasshb.com
 * Version: 1.0
 * Author: Compass HB
 * Author URI: #
 *
 */

/* Load composer dependency */
require (dirname(__FILE__) . '/../../vendor/autoload.php');

define( 'ACF_LITE', true );
Dotenv::load(__DIR__ . '/../../../');

/* Custom Data Models */ 
include_once 'custom-types.php';
include_once 'custom-fields.php';
include_once 'custom-columns.php';
include_once 'custom-taxonomies.php';

/* Wordpress Admin/Dashboard Specific */
include_once 'inc/admin.php';

/* APIs */
include_once 'inc/api/vimeo.php';
include_once 'inc/api/esv.php';
include_once 'inc/api/smugmug.php';
include_once 'inc/feeds.php';
include_once 'inc/random-sermon.php';

/* Scripture Library */
include_once 'inc/scripture_library.php';

/* Append Robots.txt */
add_filter( 'robots_txt', 'robots_mod', 10, 2 );
function robots_mod( $output, $public ) {
	$comment1 = "# Visit tech.compasshb.com\n\n";
	$comment2 = "\nUser-agent: ia_archiver\nDisallow: /\n\n";
	$output = $comment1 . $output . $comment2;
	return $output;
}

/* 404 Monitor */
function chb_404_monitor() {
	global $wp_query;
	
	$status_not_found = $wp_query->is_404;
	
	if ($status_not_found) {
		
		$to = get_option('admin_email');
		$subject = '404: ' . $_SERVER['REQUEST_URI'];
		$content = '404 URL: ' . $_SERVER['REQUEST_URI'] . '\n\n' . 'Referred by: ' . isset($_SERVER['HTTP_REFERER']) ? '' : $_SERVER['HTTP_REFERER'] . '\n\n' . 'User Agent: ' . $_SERVER['HTTP_USER_AGENT'];
		@mail($to, $subject, $content);
		
	}
}

add_action('get_header', 'chb_404_monitor');