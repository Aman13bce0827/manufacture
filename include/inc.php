<?php
/* Define Constants */
define( 'MANUFACTORY_IMGURI', get_template_directory_uri() . '/images' );

/**
 * Register three widget areas.
 *
 * @since Manufactory 1.0
 */
if ( ! function_exists( 'manufactory_widgets_init' ) ) {
	function manufactory_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Right Sidebar', "manufactory" ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "manufactory" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Left Sidebar', "manufactory" ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "manufactory" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Woocommerce Sidebar', 'manufactory' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Appears in the Content section of the site.', 'manufactory' ),
			'before_widget' => '<aside id="%1$s" class="widget woocommerce-widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 1', "manufactory" ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "manufactory" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 2', "manufactory" ),
			'id'            => 'sidebar-5',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "manufactory" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 3', "manufactory" ),
			'id'            => 'sidebar-6',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "manufactory" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 4', "manufactory" ),
			'id'            => 'sidebar-7',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "manufactory" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		));
	}
	add_action( 'widgets_init', 'manufactory_widgets_init' );
}

/* Check string for Null or Empty & Print It */
if ( ! function_exists( 'manufactory_content' ) ) :

	function manufactory_content( $before_val, $after_val, $val ) {

		if( $val != "" ) {
			return $before_val.$val.$after_val;
		}
		else {
			return "";
		}
	}
endif;

require_once( trailingslashit( get_template_directory() ) . 'include/customizer.php' );
require_once( trailingslashit( get_template_directory() ) . 'include/postlike/postlike.php' );
require_once( trailingslashit( get_template_directory() ) . 'include/nav_walker.php' );
require_once( trailingslashit( get_template_directory() ) . 'include/page_walker.php' );
require_once( trailingslashit( get_template_directory() ) . 'include/woocommerce.php' );