<?php

// Variables
$sermon_number = get_field('sermon_number');
$sermon_text = get_field('sermon_text');
$sermon_video = get_field('video_oembed');
$sermon_worksheet = get_field('sermon_worksheet');
$sermon_series = get_field('sermon_series');

?>

<div id="content-wrap" class="container clr full-width">
	<section id="primary" class="content-area clr">
		<div id="content" class="site-content clr" role="main">
			<?php
			// Featured image
			if ( has_post_thumbnail() ) {
				$wpex_image = wpex_image( 'array' ); ?>
				<div id="post-media" class="clr">
					<img src="<?= $wpex_image['url']; ?>" title="<?= esc_attr( the_title_attribute( 'echo=0' ) ); ?>" width="300"/>
				</div><!-- #post-media -->
			<?php } ?>
			<?php
			$series = get_posts(array( 
				'post_type' => 'sermon',
				'meta_query' => array(
					array(
						'key' => 'sermon_series', // name of custom field
						'value' => '"' . $sermon_series[0]->ID . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
						'compare' => 'LIKE' 
						)
					),
			)); 
			$series_part = count($series);					
			foreach ($series as $single_series) {
				if ($post->ID == $single_series->ID) {
					break;
				} else {
					$series_part--;
				}
			}	?>
			<article class="entry clr">
				<div class="series-title"><a href="<?= get_permalink( $sermon_series[0]->ID ); ?>"><?= $sermon_series[0]->post_title; ?>: Part <?= $series_part; ?></a></div>
				<div class="sermon-title"><?php the_title(); ?></div><br/>
				<div class="byline">
					<span>By <?= get_the_author(); ?></span>
					<span><?= str_replace('Sep', 'Sept', get_the_date('M'));?>. <?= get_the_date(' j, Y'); ?></span>
					<span><?= $sermon_text; ?></span>
					<span>Sermon #<?= $sermon_number; ?></span>
					<?php 
						if ($sermon_worksheet) {
							echo '<span><a href="' . $sermon_worksheet['url'] . '" target="_blank">Download Worksheet</a></span>';
						} 
					?>
				</div>
				<hr align="center" style="centerwidth: 70%; border: 0; height: 1px; background-color: #E4E4E4">
				<div class="post-leadin"><?= get_post_meta($post->ID, '_yoast_wpseo_metadesc', true); ?></div>
				
				<?php $embed_args = array(
				    'title' => 0,
				    'byline' => 0,
				    'portrait' => 0,
				    'color' => '477e9c',
				    'width' => '1048',
				    'height' => '589',
				    'player_id' => 'my_player',
				);
				$iframe = wp_oembed_get( $sermon_video , $embed_args );
				?>
				<div class="post-video"><center><?= $iframe; ?></center><br/><br/></div>
				
				<div class="post-sidebar" style="clear: both; float: left; padding: 0 10px; width: 155px;">
					<?php // wpex_social_share(); ?>
				</div>
				
				<div class="post-content">
				<?php if ($post->post_content == "") {
					echo "A transcript of this sermon has not been published yet.<br/>";
				} else {
					the_content();
				} ?>
				<br/><script src="//static.feedpress.it/js/button.js" async></script><p><a href="http://feeds.compasshb.com/sermons" class="feedpress-button" name="feed-9008">Subscribe to Compass Bible Church &raquo; Sermons</a></p></br>
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