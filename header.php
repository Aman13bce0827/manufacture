<?php
/**
 * The Header for our theme
 *
 *
 * @package WordPress
 * @subpackage Manufactory
 * @since Manufactory 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-offset="200" data-spy="scroll" data-target=".ow-navigation">

	<div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="loader-inner ball-clip-rotate">
				<div></div>
			</div>
		</div>
	</div>

	<header class="header-main container-fluid no-padding">
		<div id="slidepanel">
		<?php
		if( manufactory_options("opt_header_email") != "" || manufactory_options("opt_service_provider") != "" ) {
			?>
			<div class="top-header container-fluid">
				<div class="container">
					<div class="row">
						<?php 
							if( class_exists( 'Woocommerce' ) ) {
								echo manufactory_content( '<div class="col-md-4 col-sm-5 col-xs-4 header-info-text"><span>','</span></div>',esc_attr(manufactory_options("opt_service_provider") ) );
							}
							else {
								echo manufactory_content( '<div class="col-md-6 col-sm-6 col-xs-6 header-info-text"><span >','</span></div>',esc_attr(manufactory_options("opt_service_provider") ) );
							}
							
							if( class_exists( 'Woocommerce' ) && manufactory_options("opt_header_email") != "" ) {
								?>
								<div class="header-contact-info col-md-4 col-sm-4 col-xs-4">
									<span><?php esc_html_e('Email:',"manufactory"); ?></span><a href="mailto:<?php echo strtolower( manufactory_options("opt_header_email") ); ?>"><?php echo strtolower( manufactory_options("opt_header_email") ); ?></a>
								</div>
								<?php
							}
							elseif( manufactory_options("opt_header_email") != "" ) {
								?>
								<div class="header-contact-info col-md-6 col-sm-6 col-xs-6">
									<span><?php esc_html_e('Email:',"manufactory"); ?></span><a href="mailto:<?php echo strtolower( manufactory_options("opt_header_email") ); ?>"><?php echo strtolower( manufactory_options("opt_header_email") ); ?></a>
								</div>
								<?php
							}
							
							if( class_exists( 'Woocommerce' ) ) {
								?>
								<div class="wc-header-text col-md-4">
								
									<?php
									if ( is_user_logged_in() ) {
										?>
										<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php esc_html_e('My Account', "manufactory"); ?></a>
										<?php esc_html_e(' / ', 'manufactory'); ?>
										<a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>"><?php esc_html_e('Logout', "manufactory"); ?></a>
										<?php
									}
									else {
										?>
										<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php esc_html_e('Login / Register', "manufactory"); ?></a>
										<?php
									}
									?>
								</div>
								<?php
							}
						?>
					</div>
				</div>
			</div>
			<?php
		}
		?>
			<div class="middle-header container-fluid">
				<div class="container">
					<div class="logo-block">
						<?php 
							if ( get_theme_mod( 'slogo' ) ) : ?>
								<a class="image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
									<img src="<?php echo get_theme_mod( 'slogo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
								</a>
								<?php 
							else : 
								?>
								<a class="text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>  
								<?php 
							endif;
						?>
					</div>
					<div class="header-info">
						<?php 
							if( manufactory_options("requestform") != "" ) {
								?>
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">
								  <?php esc_html_e('Request A Quote',"manufactory"); ?>
								</button>

								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel"><?php esc_html_e('Request A Quote',"manufactory"); ?></h4>
											</div>
											 <div class="modal-body">
												<?php echo do_shortcode( manufactory_options("requestform") ); ?>
											</div>
									  
										</div>
									</div>
								</div>
								<?php
							}
						?>
						<ul>
							<li>
								<?php 
									echo manufactory_content('<h3>','</h3>',esc_attr( manufactory_options("opt_info_one") ) ); 
									echo manufactory_content('<span>','</span>',esc_attr( manufactory_options("opt_info_smallone") ) ); 
								?>
							</li>
							<li>
								<?php 
									echo manufactory_content('<h3>','</h3>',esc_attr( manufactory_options("opt_info_two") ) ); 
									echo manufactory_content('<span>','</span>',esc_attr( manufactory_options("opt_info_smalltwo") ) ); 
								?>
							</li>
							<li>
								<?php 
									echo manufactory_content('<h3>','</h3>',esc_attr( manufactory_options("opt_info_three") ) ); 
									echo manufactory_content('<span>','</span>',esc_attr( manufactory_options("opt_info_smallthree") ) ); 
								?>
							</li>
						</ul>
					</div>
				</div>
			</div>	
			<div class="container">
				<div class="header-social">
					<ul>
						<?php 
							echo manufactory_content( '<li><a target="_blank" href="','"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>',esc_url( manufactory_options("opt_facebook") ) );
							echo manufactory_content( '<li><a target="_blank" href="','"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>',esc_url( manufactory_options("opt_twitter") ) );
							echo manufactory_content( '<li><a target="_blank" href="','"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>',esc_url( manufactory_options("opt_linkedin") ) );
							echo manufactory_content( '<li><a target="_blank" href="','"><i class="fa fa-behance" aria-hidden="true"></i></a></li>',esc_url( manufactory_options("opt_behance") ) );
						?>
					</ul>
				</div>
			</div>
		</div>		

		<!-- Menu Block -->
		<div class="menu-block menu-block-section container-fluid no-padding<?php if( get_post_meta( get_the_ID(), 'manufactory_cf_menu_layout', true ) != "" && get_post_meta( get_the_ID(), 'manufactory_cf_menu_layout', true ) == 'relative' ) { echo ' menu-block-relative'; } ?>">

			<div class="container">	
				
				<nav class="navbar ow-navigation col-md-9 col-sm-12 col-xs-12 no-padding">
					<div id="loginpanel" class="desktop-hide">
						<div class="right" id="toggle">
							<a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
							<a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
						</div>
					</div>
					<div class="navbar-header">
						<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							<span class="sr-only"><?php esc_html_e('Toggle navigation',"manufactory"); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="menu-default-logo">
							<?php 
								if ( get_theme_mod( 'slogo' ) ) : ?>
									<a class="image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
										<img src="<?php echo get_theme_mod( 'slogo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
									</a>
									<?php 
								else : 
									?>
									<a class="text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>  
									<?php 
								endif;
							?>
						</div>
					</div>
					<div class="navbar-collapse collapse" id="navbar">
						<?php get_template_part("manufactorytemplates/navigation","menu"); ?>
					</div>
				</nav><!-- Navigation /- -->
				
				<div class="menu-search">
					<div id="sb-search" class="sb-search">
						<?php echo manufactory_custom_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php get_template_part("manufactorytemplates/page","banner"); ?>