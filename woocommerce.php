<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Manufactory
* @since Manufactory 1.0
*/

get_header();
?>
<main id="main" class="site-main page_spacing">

	<div class="page-content">

		<?php
		if( woocommerce_get_page_id('shop') && !is_singular('product') ) {

			/* Page Layout */
			$page_layout = get_post_meta( woocommerce_get_page_id('shop'), 'manufactory_cf_page_layout', true );

			/* Sidebar Layout */
			$sidebar_layout = get_post_meta( woocommerce_get_page_id('shop'), 'manufactory_cf_sidebar_layout', true );

			/* Widget Area */
			if( get_post_meta( woocommerce_get_page_id('shop'), 'manufactory_cf_widget_area', true ) != "" ) {
				$widget_area = get_post_meta( woocommerce_get_page_id('shop'), 'manufactory_cf_widget_area', true );
			}
			else {
				$widget_area = "sidebar-3";
			}

			if( $sidebar_layout == "right_sidebar" ) {
				$sidebar_css = "sidebar-right";
			}
			elseif( $sidebar_layout == "left_sidebar" ) {
				$sidebar_css = "sidebar-left";
			}
			elseif( $sidebar_layout == "no_sidebar" ) {
				$sidebar_css = "no-sidebar";
			}
			else {
				$sidebar_css = "sidebar-left";
			}

			/* Content Area */
			if( $sidebar_layout == "right_sidebar" ) {
				$content_area_css = "content-left col-md-9 col-sm-8";
			}
			elseif( $sidebar_layout == "left_sidebar" ) {
				$content_area_css = "content-right col-md-9 col-sm-8";
			}
			elseif( $sidebar_layout == "no_sidebar" ) {
				$content_area_css = "full-content col-md-12 no-padding";
			}
			else {
				$content_area_css = "content-left col-md-9 col-sm-8";
			}
			?>
			<div class="container no-padding">

				<!-- Content Area -->
				<div class="content-area container-shopping <?php echo esc_attr( $content_area_css ); ?>">
					<?php woocommerce_content(); ?>
				</div>

				<!-- Sidebar -->
				<?php
				if( $sidebar_layout != "no_sidebar" && is_active_sidebar( $widget_area ) ) {
					?>
					<div class="widget-area col-md-3 col-sm-4 sidebar-shop <?php echo esc_attr( $sidebar_css ); ?>">
						<div class="sidebar-inner">
							<?php dynamic_sidebar( $widget_area ); ?>
						</div><!-- .sidebar-inner -->
					</div><!-- .widget-area -->
					<?php
				}
				?>
			</div>
			<?php
		}
		else {

			/* Widget Area */
			$sidebar_layout = get_post_meta( get_the_ID(), 'manufactory_cf_sidebar_layout', true );
			
			if( get_post_meta( get_the_ID(), 'manufactory_cf_widget_area', true ) != "" ) {
				$widget_area = get_post_meta( get_the_ID(), 'manufactory_cf_widget_area', true );
			}
			else {
				$widget_area = "sidebar-3";
			}

			/* Content Area */
			if( manufactory_options("opt_wc_sidebar") != 0 ) {
				
				$content_area_css = "content-left col-md-9 col-sm-8";
			}
			else {
				$content_area_css = "col-md-12 container-shopping";
			}
			?>
			<div class="container no-padding">

				<!-- Content Area -->
				<div class="content-area <?php echo esc_attr( $content_area_css ); ?>">
					<?php woocommerce_content(); ?>
				</div>

				<!-- Sidebar -->
				<?php
				if( manufactory_options("opt_wc_sidebar") != 0 && $sidebar_layout != "no_sidebar" && is_active_sidebar( $widget_area ) ) {
					?>
					<div class="widget-area sidebar sidebar-shop col-md-3 col-sm-4">
						<div class="sidebar-inner">
							<?php dynamic_sidebar( $widget_area ); ?>
						</div><!-- .sidebar-inner -->	
					</div><!-- .widget-area -->
					<?php
				}
				?>
			</div>
			<?php
		} ?>

	</div><!-- Page Content /- -->

</main><!-- .site-main -->

<?php get_footer(); ?>