<?php

/**
 * Theme functions and definitions
*/

/* Include Core */
require get_template_directory() . '/include/inc.php';

/* Include Admin */
require get_template_directory() . '/admin/inc.php';

/* ************************************************************************ */

if( !function_exists('manufactory_options') ) :

	function manufactory_options( $option, $arr = null ) {

		global $manufactory_option;

		if( $arr ) {

			if( isset( $manufactory_option[$option][$arr] ) ) {
				return $manufactory_option[$option][$arr];
			}
		}
		else {
			if( isset( $manufactory_option[$option] ) ) {
				return $manufactory_option[$option];
			}
		}
	}
endif;

/* ************************************************************************ */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see manufactory_content_width()
 *
 * @since manufactory 1.0
 */
if ( ! isset( $content_width ) ) { $content_width = 474; }

/**
 * Adjust content_width value for image attachment template.
 *
 * @since manufactory 1.0
 */
if( !function_exists('manufactory_content_width') ) :

	function manufactory_content_width() {
		
		if ( is_attachment() && wp_attachment_is_image() ) {
			$GLOBALS['content_width'] = 810;
		}
	}
	add_action( 'template_redirect', 'manufactory_content_width' );
	
endif;

/* ************************************************************************ */

/**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since manufactory 1.0
 */
if( !function_exists('manufactory_theme_setup') ) :

	function manufactory_theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		 
		load_theme_textdomain( "manufactory", get_stylesheet_directory() . '/languages' );

		/* load theme languages */
		load_theme_textdomain( "manufactory", get_template_directory() . '/languages' );
	
		/* Image Sizes */
		set_post_thumbnail_size( 791, 421, true ); /* Default Featured Image */
		
		add_image_size( 'manufactory-791-423', 791, 423, true ); /* Single Blog Post  Gallery */
		
		add_image_size( 'manufactory-740-540', 740, 540, true ); /* Single Portfolio */
		add_image_size( 'manufactory-352-371', 352, 371, true ); /* Single Service */

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'manufactory_primary_nav'   => esc_html__( 'Primary Menu', "manufactory" ),
			'manufactory_secondary_nav'   => esc_html__( 'Footer Menu', "manufactory" ),
		) );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );

		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'manufactory_theme_setup' );
endif;

/* ************************************************************************ */

/* Google Font */
if( !function_exists('manufactory_fonts_url') ) :

	function manufactory_fonts_url() {

		$fonts_url = '';
		
		$ptsans = _x( 'on', 'PT Sans font: on or off', "maxcv" );
		$roboto = _x( 'on', 'Roboto font: on or off', "maxcv" );

		if ( 'off' !== $ptsans || 'off' !== $roboto ) {

			$font_families = array();

			if ( 'off' !== $roboto ) {
				$font_families[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
			}

			if ( 'off' !== $ptsans ) {
				$font_families[] = 'PT Sans:400,400i,700,700i';
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;

/* ************************************************************************ */

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since manufactory 1.0
 */
if( !function_exists('manufactory_enqueue_scripts') ) :

	function manufactory_enqueue_scripts() {

		// load the Internet Explorer specific stylesheet.
		wp_enqueue_style( 'ie-css', get_template_directory_uri() . '/css/ie.css' , '20131205' );
		wp_style_add_data( 'ie-css', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Load the html5 shiv.
		wp_enqueue_script( 'manufactory-respond.min', get_template_directory_uri() . '/js/html5/respond.min.js', array(), '3.7.3' );
		wp_script_add_data( 'manufactory-respond.min', 'conditional', 'lt IE 9' );

		/* Google Font */
		if( function_exists('manufactory_fonts_url') ) :
			wp_enqueue_style( 'manufactory-fonts', manufactory_fonts_url() );
		endif;

		wp_enqueue_style( 'dashicons' );
		
		wp_enqueue_style( 'manufactory-lib', get_template_directory_uri() . '/libraries/lib.css');
		
		wp_enqueue_style( 'stroke-gap-icon', get_template_directory_uri() . '/libraries/stroke-gap-Icon/stroke-gap-icon.css');
		
		wp_enqueue_style( 'manufactory-plugins', get_template_directory_uri() . '/css/plugins.css');
		
		wp_enqueue_style( 'manufactory-navigation-menu', get_template_directory_uri() . '/css/navigation-menu.css');

		/* Custom Stylesheet */
		wp_enqueue_style( 'manufactory-stylesheet', get_stylesheet_uri(), null );
		wp_add_inline_style( 'manufactory-stylesheet', get_theme_mod('custom_css') );

		wp_enqueue_style( 'manufactory-shortcode', get_template_directory_uri() . '/css/shortcode.css');

		/* Functions JS */		
		wp_enqueue_script( 'manufactory-lib', get_template_directory_uri() . '/libraries/lib.js', array( 'jquery' ),  null, true );
		wp_add_inline_script( 'manufactory-lib', '
			var templateUrl = "'.esc_url( get_template_directory_uri() ).'";
		');
		
		wp_enqueue_script( 'manufactory-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ),  null, true );
	}
	add_action( 'wp_enqueue_scripts', 'manufactory_enqueue_scripts' );
endif;

/* ************************************************************************ */

/**
 * Extend the default WordPress body classes.
 *
 * @since manufactory 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
if( !function_exists('manufactory_body_classes') ) :

	function manufactory_body_classes( $classes ) {

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = 'singular';
		}

		if( is_front_page() && !is_home() ) {
			$classes[] = 'front-page';
		}

		return $classes;
	}
	add_filter( 'body_class', 'manufactory_body_classes' );

endif;

/* ************************************************************************ */

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since manufactory 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
if( !function_exists('manufactory_post_classes') ) :

	function manufactory_post_classes( $classes ) {

		if ( ! is_attachment() && has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		}

		return $classes;
	}
	add_filter( 'post_class', 'manufactory_post_classes' );

endif;

/* ************************************************************************ */

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since manufactory 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
if( ! function_exists( 'manufactory_search_form_modify' ) ) :
	
	function manufactory_search_form_modify( $html ) {

		$html = '<form method="get" id="searchform_widget" class="searchform" action="' . home_url( '/' ) . '" >
			<div class="input-group">
			<input type="text" name="s" id="s_widget" placeholder="'.esc_html("Search Here", "manufactory").'" class="form-control" required>
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
			</span>
			</div><!-- /input-group -->
		</form>';

		return $html;
	}
	add_filter( 'get_search_form', 'manufactory_search_form_modify' );
endif;

/* ************************************************************************ */

if( ! function_exists( 'manufactory_custom_search_form' ) ) :

	function manufactory_custom_search_form() {
		
		$html = '<form method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
			<input type="text" name="s" id="s" placeholder="'.esc_html("Enter your search term...", "manufactory").'" class="form-control sb-search-input" required>
			<button class="sb-search-submit" type="submit"><i class="fa fa-search"></i></button>
			<span class="sb-icon-search"></span>
		</form>';

		return $html;
	}
endif;