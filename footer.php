<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Manufactory
 * @since Manufactory 1.0
 */
?>
	<?php 
	if( get_post_meta( get_the_ID(), 'manufactory_cf_footer_style', true ) == 'styleone' ) {
		?>
		<footer class="footer-main footer2 container-fluid no-padding">
			<div class="container">
				<div class="row">
					<?php
						if ( is_active_sidebar( 'sidebar-4' ) ) { 
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 ftr-widget about-widget">
								<?php dynamic_sidebar('sidebar-4'); ?>
							</div>
							<?php
						}
						if ( is_active_sidebar( 'sidebar-5' ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 ftr-widget custom-link">						
								<?php dynamic_sidebar('sidebar-5'); ?>
							</div>
							<?php
						}
						if ( is_active_sidebar( 'sidebar-6' ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 ftr-widget">
								<?php dynamic_sidebar('sidebar-6'); ?>
							</div>
							<?php
						}
						if ( is_active_sidebar( 'sidebar-7' ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 ftr-widget">
								<?php dynamic_sidebar('sidebar-7'); ?>								
							</div>
							<?php
						}
					?>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="col-md-6 col-sm-12 col-xs-12 no-padding copyright-section">
						<?php echo wpautop(manufactory_options("opt_footer_copyright") ); ?>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 no-padding footer-menu-link">
						<?php
							if( has_nav_menu('manufactory_secondary_nav') ) :
								wp_nav_menu( array(
									'theme_location' => 'manufactory_secondary_nav',
									'container' => false,
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth' => 10,
									'menu_class' => 'footer-menu',
									'walker' => new  manufactory_nav_walker
								));
							endif;
						?>
						
					</div>
				</div>
			</div>
		</footer>
		<?php
	}
	else {
		?>
		<footer class="footer-main container-fluid no-padding">
			<div class="container">
				<div class="row">
					<?php
						if ( is_active_sidebar( 'sidebar-4' ) ) { 
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 ftr-widget about-widget">
								<?php dynamic_sidebar('sidebar-4'); ?>
							</div>
							<?php
						}
						if ( is_active_sidebar( 'sidebar-5' ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 ftr-widget link-widget">
								<?php dynamic_sidebar('sidebar-5'); ?>
							</div>
							<?php
						}
						if ( is_active_sidebar( 'sidebar-6' ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 ftr-widget contact-widget">
								<?php dynamic_sidebar('sidebar-6'); ?>
							</div>
							<?php
						}
						if ( is_active_sidebar( 'sidebar-7' ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 ftr-widget instagram-widget">
								<?php dynamic_sidebar('sidebar-7'); ?>
							</div>
							<?php
						}
					?>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="col-md-6 col-sm-12 col-xs-12  no-padding copyright-section">
						<?php echo wpautop(manufactory_options("opt_footer_copyright") ); ?>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 no-padding footer-menu-link">
						<?php
							if( has_nav_menu('manufactory_secondary_nav') ) :
								wp_nav_menu( array(
									'theme_location' => 'manufactory_secondary_nav',
									'container' => false,
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth' => 10,
									'menu_class' => 'footer-menu',
									'walker' => new  manufactory_nav_walker
								));
							endif;
						?>
						
					</div>
				</div>
			</div>
		</footer>
		<?php
	}
	wp_footer(); 
	?>
</body>
</html>