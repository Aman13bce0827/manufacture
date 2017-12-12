<?php
/* Woocommerce */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Woocommerce', "manufactory" ),
	'icon' => 'el el-shopping-cart',
	'subsection' => false,
	'fields'     => array(
		/* Fields */
		array(
			'id'=>'info_wc_pd_widget_setting',
			'type' => 'info',
			'title' => esc_html__('Product Single', "manufactory" ),
		),
		array(
			'id'       => 'opt_wc_sidebar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Sidebar', "manufactory" ),
			'default'  => 1,
			'on'       => 'Enabled',
			'off'      => 'Disabled',
		),
		/* Fields /- */	
	)
));