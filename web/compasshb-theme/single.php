<?php
// Redirect link format if custom link defined
if ( get_post_meta( get_the_ID(), 'wpex_post_link', true ) ) : ?>
	<?php wp_redirect( wpex_permalink(), 301 ); ?>
<?php endif; ?>

<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php
		// Standard post template file
		get_template_part( 'single/content', get_post_type()); ?>

	<?php endwhile; ?>

<?php get_footer(); ?>