<?php
/**
 * Footer bottom content
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Lets bail if this section is disabled
if ( ! get_theme_mod( 'footer_bottom', true ) ) {
	return; 
}

?>

<div id="footer-bottom" class="clr">
	<div id="footer-bottom-inner" class="container clr">
		<div id="copyright" class="clr" role="contentinfo">
			<small>© 2014-<?= date("Y"); ?> Compass Bible Church Huntington Beach. All Rights Reserved.</small>
		</div><!-- #copyright -->
		<div id="footer-bottom-menu" class="clr">
			<?php
			// Display footer menu
			wp_nav_menu( array(
				'theme_location'	=> 'footer_menu',
				'sort_column'		=> 'menu_order',
				'fallback_cb'		=> false,
			) ); ?>
		</div><!-- #footer-bottom-menu -->
	</div><!-- #footer-bottom-inner -->
</div><!-- #footer-bottom -->