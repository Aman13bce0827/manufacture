<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Manufactory
 * @since Manufactory 1.0
 */
 
	/* Widget Area */
	
	$sidebar_layout = get_post_meta( get_the_ID(), 'manufactory_cf_sidebar_layout', true );
	
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
		$sidebar_css = "sidebar-right";
	}

	if( get_post_meta( get_the_ID(), 'manufactory_cf_widget_area', true ) != "" ) {
		$widget_area = get_post_meta( get_the_ID(), 'manufactory_cf_widget_area', true );
	}
	else {
		$widget_area = "sidebar-1";
	}
	
	if( $sidebar_layout != "no_sidebar" && is_active_sidebar( $widget_area ) ) {
		?>
	
		<div class="widget-area col-md-4 col-sm-4 col-xs-12 <?php echo esc_attr( $sidebar_css . " " . $widget_area ); ?>">
			<?php dynamic_sidebar( $widget_area ); ?>
		</div>
		<?php
	}