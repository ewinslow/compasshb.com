<?php
/**
 * Footer bottom content
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get footer widgets columns
$columns	= get_theme_mod( 'footer_widgets_columns', '4' );
$grid_class	= wpex_grid_class( $columns ); ?>

<div id="footer-widgets" class="clr <?php if ( '1' == $columns ) echo 'single-col-footer'; ?>">

	<div class="footer-box <?php echo $grid_class; ?> col col-1">
		<div class="footer-widget widget_text clr">
			<div class="widget-title">Compass Bible Church</div>
			<div class="textwidget">
				<p>Compass Bible Church exists to make disciples of Christ by <strong>reaching</strong> as many people as possible for Christ, <strong>teaching</strong> them to be like Christ, and <strong>training</strong> them to serve Christ.</p>
			</div>
		</div>
	</div><!-- .footer-one-box -->

	<?php
	// Footer box 2
	if ( $columns > '1' ) : ?>
		<div class="footer-box <?php echo $grid_class; ?> col col-2">
			<div class="footer-widget widget_pages clr">
				<div class="widget-title">Sitemap</div>
				<ul>
					<li class="page_item page-item-69"><a href="http://www.compasshb.com/8-distinctives/">8 Distinctives</a></li>
					<li class="page_item page-item-259"><a href="http://www.compasshb.com/giving/">Giving</a></li>
					<li class="page_item page-item-485 current_page_item"><a href="http://www.compasshb.com/">Home</a></li>
					<li class="page_item page-item-155"><a href="http://www.compasshb.com/ice-cream-evangelism/">Ice Cream Evangelism</a></li>
					<li class="page_item page-item-153"><a href="http://www.compasshb.com/kids-ministry/">Kids Ministry</a></li>
					<li class="page_item page-item-72"><a href="http://www.compasshb.com/believe/">What We Believe</a></li>
					<li class="page_item page-item-220"><a href="http://www.compasshb.com/who-we-are/">Who We Are</a></li>
				</ul>
			</div>
		</div><!-- .footer-two-box -->
	<?php endif; ?>
	
	<?php
	// Footer box 3
	if ( $columns > '2' ) : ?>
		<div class="footer-box <?php echo $grid_class; ?> col col-3 ">
			<div class="footer-widget widget_wpex_fontawesome_social_widget clr">
				<div class="widget-title">Follow Us</div>
				<div class="fontawesome-social-widget clr">
					<ul class="black flat">
						<li class="social-widget-facebook">
							<a href="https://www.facebook.com/compasshb" title="Facebook" target="_black" >
								<i class="fa fa-facebook"></i>
							</a>
						</li>
						<li class="social-widget-instagram">
							<a href="http://instagram.com/compasshb" title="Instagram" target="_black" >
								<i class="fa fa-instagram"></i>
							</a>
						</li>
						<li class="social-widget-twitter">
							<a href="https://twitter.com/compasshb" title="Twitter" target="_black" >
								<i class="fa fa-twitter"></i>
							</a>
						</li>
						<li class="social-widget-vimeo-square">
							<a href="http://vimeo.com/compasshb" title="Vimeo" target="_black" >
								<i class="fa fa-vimeo-square"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div><!-- .footer-three-box -->
	<?php endif; ?>

	<?php
	// Footer box 4
	if ( $columns > '3' ) : ?>
		<div class="footer-box <?php echo $grid_class; ?> col col-4">
			<div class="footer-widget widget_text clr">
				<div class="widget-title">Contact Us</div>
				<div class="textwidget">
					<strong>Office</strong><br/>
					Compass Bible Church<br/>
					16168 Beach Blvd<br/>
					Huntington Beach, CA 92647<br/>
					(714) 375-5817<br/><br/>
					<a href="mailto:info@compasshb.com">info@compasshb.com</a>
				</div>
			</div>
		</div><!-- .footer-box -->
	<?php endif; ?>

</div><!-- #footer-widgets -->