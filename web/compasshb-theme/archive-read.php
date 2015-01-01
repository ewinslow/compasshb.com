<?php
/**
 * The template for displaying Scripture of the Day archive pages.
 *
 * Used to redirect the user to the latest post.
 *
 */

if (have_posts()) : the_post();
	header("Location: ". get_permalink());
	exit;
endif;