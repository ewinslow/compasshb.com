<?php
/**
 * The template for displaying Scripture of the Day archive pages.
 *
 * Used to redirect the user to the latest post.
 *
 */
query_posts('&post_type=post&format=scripture-of-the-day&showposts=1');
if (have_posts()) : the_post();
    header("Location: ".get_permalink());
    exit;
endif;
