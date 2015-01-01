<div id="content-wrap" class="container clr full-width">
	<section id="primary" class="content-area clr">
		<div id="content" class="site-content clr" role="main">
			<article class="entry clr">
				<div class="series-title"><a href="/read/">Scripture of the Day</a></div>
				<div class="sermon-title"><?php the_title(); ?></div><br/>
				<div class="byline">
					<span><?= str_replace('Sep', 'Sept', get_the_date('l, M')); ?>. <?= get_the_date(' j, Y'); ?></span>
					<span><a href="#disqus_thread"><?= comments_number("No comments", "1 comment", "% comments"); ?></a></span>
					<span><a href="https://itunes.apple.com/us/podcast/scripture-of-the-day/id945286142">Subscribe to iTunes Podcast</a></span>
					<span><a href="http://feeds.compasshb.com/read">Subscribe to RSS Feed</a></span>
				</div>
				<hr align="center" style="centerwidth: 70%; border: 0; height: 1px; background-color: #E4E4E4">				
				<div class="post-sidebar" style="clear: both; float: left; padding: 0 10px; width: 155px;">
					<?php // wpex_social_share(); ?><br/>
				</div>
				
				<div class="post-content">
					<?php
					// Message for weekend
					if (date('D') == "Sun" || date('D') == "Sat") {
						echo "<em>Scripture of the Day is posted Monday - Friday. Come back on Monday for the next post!</em>";
					} 
					if (get_field('sotd_summary')) { ?>
						<div class="pastor-summary"><?= the_field('sotd_summary'); ?></div>
					<?php } ?>
					
					<?php 
						if (wp_is_mobile()) {
							echo sotd(get_the_title(), 'mp3');							
						} else {
							echo sotd(get_the_title());
						}
					?>
					
					
					<br/>
					
					<script src="//static.feedpress.it/js/button.js" async></script><p><a href="http://feeds.compasshb.com/read" class="feedpress-button" name="feed-9178">Subscribe to Compass Bible Church &raquo; Scripture of the Day</a></p><br/>
					
					<?php
					// Featured image
					if ( has_post_thumbnail() ) {
						$wpex_image = wpex_image( 'array' ); ?>
						<div id="post-media" class="clr">
							<img src="<?= $wpex_image['url']; ?>" title="<?= esc_attr( the_title_attribute( 'echo=0' ) ); ?>" style="width: 300px" />
						</div><!-- #post-media -->
					<?php } ?>
					
				</div>
			</article><!-- .entry -->
			<?php
			// Link pages when using <!--nextpage-->
			wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
			?>
			

			<div style="max-width: 600px; margin: 0 auto;">
				<br/><input type="submit" style="width: 100%" value="View Comments (<?= get_comments_number(); ?>)" 
					onclick='jQuery( "#disqus_thread" ).show();'/><br/><br/>
			</div>
			
			<?php
			// Get the post comments & comment_form
			comments_template(); 

			// Pagination
			get_template_part('partials/next', 'prev');
			?>
			<p style="color: #888;"><em>Scripture taken from The Holy Bible, English Standard Version. Copyright &copy;2001 by <a href="http://www.crosswaybibles.org" target="_blank">Crossway Bibles</a>, a publishing ministry of Good News Publishers. Used by permission. All rights reserved. Text provided by the <a href="http://www.gnpcb.org/esv/share/services/" target="_blank">Crossway Bibles Web Service</a>.</em></p>
		</div><!-- #content -->
	</section><!-- #primary -->
</div><!-- .container -->