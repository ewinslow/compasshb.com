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