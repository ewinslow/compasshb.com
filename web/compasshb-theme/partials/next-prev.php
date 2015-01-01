<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Display next/prev links if enabled - see functions/commons.php
if ( !wpex_option( 'blog_next_prev', '1' ) ) {
	exit;
}

// Get post ID
global $post;
$post_id = $post->ID;

// Get current post post type
$post_type = get_post_type( $post_id );

// Set default same category + taxonomy vars
$taxonomy = '';

// Check if post has terms if so then show next/prev from the same_cat
$has_terms	= wpex_post_has_terms( $post_id );
$same_cat	= $has_terms;
$same_cat	= apply_filters( 'wpex_prev_post_link_same_cat', $same_cat );

// Set the taxonomy for the next/prev when in the same cat
if ( $post_type == 'post' ) {
	$taxonomy = 'category';
} elseif ( $post_type == 'portfolio' ) {
	$taxonomy = 'portfolio_category';
} elseif ( $post_type == 'staff' ) {
	$taxonomy = 'staff_category';
} elseif ( $post_type == 'testimonials' ) {
	$taxonomy = 'testimonials_category';
}

// Previous post link title
$prev_post_link_title = ( in_array( $post_type, array( 'testimonials' ) ) ) ? __( 'Next', 'wpex' ) : '%title';
$prev_post_link_title = '<span class="fa fa-angle-double-left"></span>' . $prev_post_link_title;
$prev_post_link_title = apply_filters( 'wpex_prev_post_link_title', $prev_post_link_title );

// Next post link title
$next_post_link_title = ( in_array( $post_type, array( 'testimonials' ) ) ) ? __( 'Previous', 'wpex' ) : '%title';
$next_post_link_title = $next_post_link_title . '<span class="fa fa-angle-double-right"></span>';
$next_post_link_title = apply_filters( 'wpex_next_post_link_title', $next_post_link_title ); ?>

<div class="clr"></div>
<div class="post-pagination-wrap clr">
	<ul class="post-pagination clr">
		<?php
		// Next/Prev in same cat
		if ( $has_terms ) {
			next_post_link( '<li class="post-next">%link</li>', $next_post_link_title, $same_cat, '', $taxonomy );
			previous_post_link( '<li class="post-prev">%link</li>',  $prev_post_link_title, $same_cat, '', $taxonomy );
		}
		// Next/Prev not in same cat
		else {
			next_post_link( '<li class="post-next">%link</li>', $next_post_link_title );
			previous_post_link( '<li class="post-prev">%link</li>', $prev_post_link_title );
		} ?>
	</ul><!-- .post-post-pagination -->
</div><!-- .post-pagination-wrap -->