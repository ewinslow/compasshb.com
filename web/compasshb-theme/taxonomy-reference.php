<?php
// Get site header
get_header(); ?>
	
	<div id="content-wrap" class="container clr <?= wpex_get_post_layout_class(); ?>">
		<section id="primary" class="content-area clr">
			<div id="content" class="site-content" role="main">
				<?php
				// Execute the following code if posts infact exist
				if ( have_posts() ) :
					// Loop through posts
					while ( have_posts() ) : the_post();
						// Get template part
						wpex_get_template_part();
					// End loop
					endwhile;
				// Display pagination - see function/pagination.php
				wpex_blog_pagination();
				// Show message because there aren't any posts
				else : ?>
					<article class="clr"><?php _e( 'No Posts found.', 'wpex' ); ?></article>
				<?php endif; ?>
			</div><!-- #content -->
		</section><!-- #primary -->
		<?php
		// Get site sidebar
		get_sidebar(); ?>
	</div><!-- .container -->
	
<?php
// Get site footer
get_footer(); ?>