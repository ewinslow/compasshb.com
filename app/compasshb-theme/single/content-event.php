<div id="content-wrap" class="container clr full-width">
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
				<div class="series-title"><a href="/article/">Event</a></div>
				<div class="sermon-title"><?php the_title(); ?></div><br/>
				<div class="byline">
					<span><?= str_replace('Sep', 'Sept', get_the_date('M'));?>. <?= get_the_date(' j, Y'); ?></span>
				</div>
				<hr align="center" style="centerwidth: 70%; border: 0; height: 1px; background-color: #E4E4E4">				
				<div class="post-sidebar" style="clear: both; float: left; padding: 0 10px; width: 155px;">
					<?php // wpex_social_share(); ?>
				</div>
				
				<div class="post-content">
					<?php the_content(); ?>
				</div>
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
</div><!-- .container -->