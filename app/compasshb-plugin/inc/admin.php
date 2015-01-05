<?php

/**************************************************
 * Global Settings
 **************************************************/

/* Timezone */
date_default_timezone_set('America/Los_Angeles');

/* Disable W3TC footer comment */
add_filter( 'w3tc_can_print_comment', function( $w3tc_setting ) { return false; }, 10, 1 );

add_action('wp_head','hook_javascript');

function hook_javascript() {
	
	echo '<script src="//d2wy8f7a9ursnm.cloudfront.net/bugsnag-2.min.js" data-apikey="dc73bcf2db4d4cf163d268a621826b88"></script>';

}

/* Hide the Get Shortlink button for Custom Post Types */
add_filter( 'pre_get_shortlink', '__return_empty_string' );

/* Hide Post Menu in Admin */
add_action( 'admin_menu', 'remove_menus' );

function remove_menus() {
	
  	remove_menu_page( 'edit.php' );

}

/* Show custom post types on dashboard activity widget */
add_action( 'pre_get_posts', 'include_cpt_in_activity' );

function include_cpt_in_activity($query) {
	
	$requesturi = $_SERVER['REQUEST_URI'];
    
	if ( is_admin() && 
		!$query->is_main_query() && 
		$query->get( 'post_type' ) && 
		( $requesturi == '/wp-admin/' || $requesturi == '/wp-admin/index.php') ) {
			$query->set( 'post_type', array('sermon', 'video', 'series', 'article', 'read') );
    }
}

add_filter( 'dashboard_glance_items', 'custom_glance_items', 10, 1 );

function custom_glance_items( $items = array() ) {
    $post_types = array( 'sermon', 'video', 'series', 'article', 'read');
    foreach( $post_types as $type ) {
        if( ! post_type_exists( $type ) ) continue;
        $num_posts = wp_count_posts( $type );
        if( $num_posts ) {
            $published = intval( $num_posts->publish );
            $post_type = get_post_type_object( $type );
            $text = _n( '%s ' . $post_type->labels->singular_name, '%s ' . $post_type->labels->name, $published, 'your_textdomain' );
            $text = sprintf( $text, number_format_i18n( $published ) );
            if ( current_user_can( $post_type->cap->edit_posts ) ) {
            $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $text . '</a>';
                echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
            } else {
            $output = '<span>' . $text . '</span>';
                echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
            }
        }
    }
    return $items;
}

function compass_video_og() {
		
	global $post;
	
	if($post->post_type == 'page' && $post->ID == '485') {
		
		// Find most recent sermon video
		$args = array (
			'post_type'			=>	'sermon',
			'posts_per_page'	=>	20,
		);

		wp_reset_query();
		query_posts($args);

		while ( have_posts() ) : the_post();
			if (get_field('video_oembed')) {
				$video_thumb = implode(get_vimeo_thumb(get_field('video_oembed')));
				echo '<meta property="og:image" content="' . $video_thumb . '" />';
				break;
			}
		endwhile;

		wp_reset_query();

	}
}

/**************************************************
 * Other Settings
 **************************************************/

// Author: Jari Pennanen
// License: Public Domain
// 2014-04-16
 
/**
 * Display taxonomy selection in admin as select box
 *
 * @param WP_Post $post
 * @param array $box
 */

function my_admin_taxonomy_select_meta_box($post, $box) {
    $defaults = array('taxonomy' => 'category');
    
    if (!isset($box['args']) || !is_array($box['args']))
        $args = array();
    else
        $args = $box['args'];
    
    extract(wp_parse_args($args, $defaults), EXTR_SKIP);
    
    $tax = get_taxonomy($taxonomy);
    $selected = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
    $hierarchical = $tax->hierarchical;
    ?>
    <div id="taxonomy-<?= $taxonomy; ?>" class="selectdiv">
        <?php if (current_user_can($tax->cap->edit_terms)): ?>
        <?php 
            if ($hierarchical) {
                wp_dropdown_categories(array(
                   'taxonomy' => $taxonomy,
                   'class' => 'widefat',
                   'hide_empty' => 0, 
                   'name' => "tax_input[$taxonomy][]",
                   'selected' => count($selected) >= 1 ? $selected[0] : '',
                   'orderby' => 'name', 
                   'hierarchical' => 1, 
                   'show_option_all' => " "
                ));
            } else {
                ?>
                <select name="<?= "tax_input[$taxonomy][]"; ?>" class="widefat">
                    <option value="0"></option>
     				<?php foreach (get_terms($taxonomy, array('hide_empty' => false)) as $term): ?>
						<option value="<?= esc_attr($term->slug); ?>" <?= selected($term->term_id, count($selected) >= 1 ? $selected[0] : ''); ?>><?= esc_html($term->name); ?></option>
					<?php endforeach; ?>
				</select>
                <?php 
            }
        ?>
        <?php endif; ?>
    </div>
    <?php
}