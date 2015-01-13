<?php $video = get_field('video_oembed'); ?>
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
				<?= wp_oembed_get($video, array('width'=>700)); ?>
				<p><?= get_the_date('l, F j, Y', '<p>', '</p>'); ?></p>				
				<?= get_the_content(); ?>
			</article><!-- .entry -->
			<?php
			// Link pages when using <!--nextpage-->
			wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
			// Social sharing links
			// wpex_social_share();
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