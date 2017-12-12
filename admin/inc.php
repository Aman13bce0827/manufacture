<?php

/* TGM Plugin Activation Notice */
require get_template_directory() .'/admin/tgm/tgm.php';

if ( class_exists( 'ReduxFramework' ) ) {

	/* Theme Options */
	require get_template_directory() .'/admin/theme-options/theme-options.php';
}

function manufactory_admin_enqueue() {

	wp_enqueue_media();

	wp_enqueue_script( 'manufactory-admin-functions', get_template_directory_uri() . '/admin/js/functions.js', array( 'jquery' ),  null, true );
	wp_enqueue_style( 'manufactory-admin-css', get_template_directory_uri() . '/admin/css/style.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'manufactory_admin_enqueue' );