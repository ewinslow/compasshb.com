<?php

// Shortcode
function compasshb_grid_func($atts, $content = null) {
	
	// Parse attributes
	$a = shortcode_atts( array(
		'type' => 'video',
		'title' => 'Recent Posts',
		'number' => 4,
    ), $atts );

	ob_start();
	vcex_compasshb_grid($a); 
	return ob_get_clean();
}
add_shortcode( 'compasshb_grid', 'compasshb_grid_func' );


/**
 * HTML output of the compasshb shortcode for post grid
 */
function vcex_compasshb_grid($a) {
	
	
	
	query_posts('post_type=' . $a['type'] . '&post_status=publish&posts_per_page=' . $a['number'] );
	$count = 1;  ?>
	
	<div class="wpb_wrapper"><h2><?= $a['title']; ?></h2><a href="/<?= $a['type']; ?>/">View All</a></div>
	<div class="wpex-row vcex-portfolio-grid vcex-clearfix"> 
	
	<?php while ( have_posts() ) : the_post(); ?>
 
		<article class="portfolio-entry col span_1_of_<?= $a['number']; ?> col-<?= $count; ?> cat-8">
			<div class="portfolio-entry-media clr">
				<div class="portfolio-featured-video responsive-video-wrap clr">
					<?php // Display default thumbnail until video is available
					if (get_field('video_oembed') != '') {
						echo wp_oembed_get(get_field("video_oembed"), array('width'=>640));
					} else { 
						echo '<img src="/wp-content/uploads/2014/10/sermon-video-thumbnail.jpg"/>';
					} ?>
				</div>
			</div>
			<div class="portfolio-entry-details clr" >
				<h2 class="portfolio-entry-title" >
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php $sermon_number = get_field('sermon_number'); if ($sermon_number) { echo '#' . $sermon_number . '. '; } the_title(); ?></a>
				</h2>
				<?php the_time('l, F j, Y', '<p>', '</p>'); ?>
				<div class="portfolio-entry-excerpt clr">
					<a href="<?php the_permalink(); ?>" title="See More" rel="bookmark" class="vcex-readmore theme-button"> See More <span class="vcex-readmore-rarr">&rarr;</span></a>
				</div>
			</div><!-- .portfolio-entry-details -->
		</article><!-- .portfolio-entry -->

	<?php $count++; endwhile; wp_reset_query(); ?>
	
	</div><!-- .vcex-portfolio-grid -->

<?php return; } ?>