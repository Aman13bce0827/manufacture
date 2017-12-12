<?php
/* Footer Settings */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Footer Settings', "manufactory" ),
	'icon' => 'el el-wrench-alt',
	'subsection' => false,
	'fields'     => array(
		/* Fields */
		
		array(
			'id'       => 'opt_footer_copyright',
			'type'     => 'editor',
			'title'    => esc_html__( 'Copyright Text', "manufactory" ),
			'subtitle' => esc_html__( 'Use any of the features of WordPress editor inside your panel!', "manufactory" ),
			'default'  => 'Copyrights &copy; 2016  All Rights Reserved',
		),
		/* Fields /- */	
	),
));
?>