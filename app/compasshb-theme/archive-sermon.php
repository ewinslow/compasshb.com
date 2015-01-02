<?php

// Get site header
get_header(); ?>
	
	<div id="content-wrap" class="container clr <?= wpex_get_post_layout_class(); ?>">
		<section id="primary" class="content-area clr">
			<div id="content" class="site-content" role="main">
				
				<h1>Recent Sermons</h1>
				
				<ul>
				<?php
					$args = array( 'post_type' => 'sermon', 'posts_per_page' => 20, 'class' => 'Weekend Service' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
				<li>#<?= get_field('sermon_number'); ?>. <a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a> - <?= get_field('sermon_text'); ?></li>
				<?php	
					endwhile;
				?>
				</ul><br/><br/>
				
				<h1>Scripture Library</h1>
				<p>Every scripture reference on this website can be found in one of the categories below.</p><br/>
				
				<?php scripture_library_output_table(); ?>
				
				<br clear="both"/>
				
			</div><!-- #content -->
		</section><!-- #primary -->
		<?php
		// Get site sidebar
		 get_template_part("partials/sidebar", "sermon"); ?>		
	</div><!-- .container -->
	
<?php
// Get site footer
get_footer(); ?>