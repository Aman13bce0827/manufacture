<?php
/* Header Settings */
Redux::setSection( $opt_name, array(
	'title'  => esc_html( 'Header', "manufactory" ),
	'id'    => 'header_settings',
	'icon'  => 'el el-credit-card',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'=>'info_topheader',
			'type' => 'info',
			'title' => 'Top Header',
		),
		array(
			'id'=>'opt_service_provider',
			'type' => 'text',
			'title' => 'Service Provider Text',
			'default'  => esc_html('Your Trusted 24 Hours Service Provider!', "manufactory")
		),
		array(
			'id'=>'opt_header_email',
			'type' => 'text',
			'title' => 'Email Address',
			'default'  => esc_html('Support@info.com', "manufactory")
		),
		/* -- Top Header */
		
		array(
			'id'=>'requestform',
			'type' => 'text',
			'title' => 'Request Form',
			'default'  => esc_html('[contact-form-7 id="67" title="Request Form"]', "manufactory")
		),
		
		array(
			'id'=>'info_mheader',
			'type' => 'info',
			'title' => 'Header Text',
		),
		array(
			'id'=>'opt_info_one',
			'type' => 'text',
			'title' => 'Information Text 1',
			'default'  => esc_html('Number #1 Provider', "manufactory")
		),
		array(
			'id'=>'opt_info_smallone',
			'type' => 'text',
			'title' => 'Small Information Text 1',
			'default'  => esc_html('of Industrial Solution', "manufactory")
		),
		
		array(
			'id'=>'opt_info_two',
			'type' => 'text',
			'title' => 'Information Text 2',
			'default'  => esc_html('Global Certificate', "manufactory")
		),
		array(
			'id'=>'opt_info_smalltwo',
			'type' => 'text',
			'title' => 'Small Information Text 2',
			'default'  => esc_html('ISO 9001:2015', "manufactory")
		),
		
		array(
			'id'=>'opt_info_three',
			'type' => 'text',
			'title' => 'Information Text 3',
			'default'  => esc_html('Award Winning', "manufactory")
		),
		array(
			'id'=>'opt_info_smallthree',
			'type' => 'text',
			'title' => 'Small Information Text 3',
			'default'  => esc_html('Solution Of The Year', "manufactory")
		),
		
		/* -- Header Text */
		array(
			'id'=>'info_social',
			'type' => 'info',
			'title' => 'Header Social',
		),
		array(
			'id'=>'opt_facebook',
			'type' => 'text',
			'title' => 'Facebook URL',
			'default'  => esc_html('facebook.com', "manufactory")
		),
		array(
			'id'=>'opt_twitter',
			'type' => 'text',
			'title' => 'Twitter URL',
			'default'  => esc_html('twitter.com', "manufactory")
		),
		array(
			'id'=>'opt_linkedin',
			'type' => 'text',
			'title' => 'Linkedin URL',
			'default'  => esc_html('linkedin.com', "manufactory")
		),
		array(
			'id'=>'opt_behance',
			'type' => 'text',
			'title' => 'Behance URL',
			'default'  => esc_html('behance.com', "manufactory")
		),
		
	)
) );
/* Header Settings /- */
?>