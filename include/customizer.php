<?php
/**
 * Manufactory Customizer functionality
 *
 * @package WordPress
 * @subpackage Manufactory
 * @since Manufactory 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Manufactory 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
add_action( 'customize_register', 'manufactory_theme_customize_register' );

function manufactory_theme_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'manufactory_section_1',
		array(
			'title'       => esc_html__( 'Advanced Options', "manufactory" ),
			'priority'    => 30
		)
	);

	$wp_customize->add_setting(
		'custom_css',
		array(
			'default'              => '',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'wp_filter_nohtml_kses',
			'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'manufactory_example_css_control',
		array(
			'label'    => esc_html__( 'Custom CSS', "manufactory" ),
			'section'  => 'manufactory_section_1',
			'settings' => 'custom_css',
			'type'     => 'textarea'
		)
	);

	/* Text An Image Logo */
 	$wp_customize->add_section( 'manufactory_logo_section' , array(
		'title'       => esc_html__( 'Logo', "manufactory" ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'manufactory_logo', array(
		'label'    => esc_html__( 'Logo', "manufactory" ),
		'section'  => 'manufactory_logo_section',
		'settings' => 'manufactory_logo',
	) ) );
	 $wp_customize->add_setting( 'manufactory_logo',
        'sanitize_callback' == 'esc_url_raw'
    );
	
	$wp_customize->add_setting( 'slogo',
		'sanitize_callback' == 'esc_url_raw'
	); // Add setting for logo uploader

    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slogo', array(
        'label'    => esc_html__( 'Upload Logo', "manufactory" ),
        'section'  => 'title_tagline',
        'settings' => 'slogo',
    ) ) );
}