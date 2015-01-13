<?php
/**
 * The Template for displaying all single videos.
 *
 */
?>

<div id="content-wrap" class="container clr <?= wpex_get_post_layout_class(); ?>">
	<section id="primary" class="content-area clr">
		<div id="content" class="site-content clr" role="main">
			<?php
			// Featured image
			if ( has_post_thumbnail() ) {
				$wpex_image = wpex_image( 'array' ); ?>
				<div id="post-media" class="clr">
					<img src="<?= $wpex_image['url']; ?>" title="<?= esc_attr( the_title_attribute( 'echo=0' ) ); ?>" width="<?= $wpex_image['width']; ?>" height="<?= $wpex_image['height']; ?>" />
				</div><!-- #post-media -->
			<?php } ?>
			<article class="entry clr">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<!-- <?php the_date('l, F j, Y', '<p>', '</p>'); ?> -->	
				
				<?php 
				$series = get_posts(array( 
					'post_type' => 'sermon',
					'meta_query' => array(
						array(
							'key' => 'sermon_series', // name of custom field
							'value' => '"' . $post->ID . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
							'compare' => 'LIKE' 
							)
						),
				)); 
				$s_count = 1;
				foreach (array_reverse($series) as $single) {
					echo '<p>#' . $s_count . '. <a href="' . get_permalink($single->ID) . '">' . $single->post_title . '</a> ' . date('M j, Y', strtotime($single->post_date)) . ' ' . get_field('sermon_text', $single->ID) . '<br/>';
					echo get_post_meta($single->ID, '_yoast_wpseo_metadesc', true) . '</p>';
					$s_count++;
				}	?>

			</article><!-- .entry -->
			<?php
			// Link pages when using <!--nextpage-->
			wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
			// Get the post comments & comment_form
			comments_template();
			
			// Pagination
			get_template_part('partials/next', 'prev');	
			?>
			
		</div><!-- #content -->
	</section><!-- #primary -->
	<?php
	// Get site sidebar
	get_sidebar();
	?>
	
</div><!-- .container -->