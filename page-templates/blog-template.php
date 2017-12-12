<?php
/*
*	Template Name: Blog Page
*/

get_header();

	/* Page Layout */
	$page_layout = get_post_meta( get_the_ID(), 'manufactory_cf_page_layout', true );

	if( $page_layout != "fluid" ) {
		$page_layout_css = "container";
	}
	else {
		$page_layout_css = "container-fluid no-padding";
	}

	/* Widget Area */
	if( get_post_meta( get_the_ID(), 'manufactory_cf_sidebar_layout', true ) != "" ) {
		$sidebar_layout = get_post_meta( get_the_ID(), 'manufactory_cf_sidebar_layout', true );
	}
	else {
		$sidebar_layout = "";
	}

	/* Content Area */
	if( $sidebar_layout == "right_sidebar" ) {
		$content_area_css = "content-left col-md-8 col-sm-8";
	}
	elseif( $sidebar_layout == "left_sidebar" ) {
		$content_area_css = "content-right col-md-8 col-sm-8";
	}
	elseif( $sidebar_layout == "no_sidebar" ) {
		$content_area_css = "full-content col-md-12 no-padding";
	}
	else {
		$content_area_css = "col-md-8 col-sm-8";
	}

	if( get_post_meta( get_the_ID(), 'manufactory_cf_content_padding', true ) == "off" ) {
		$page_css = " no-padding no-margin";
	}
	else {
		$page_css = " page_spacing";
	}

	/* Sidebar CSS */
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

	/* Widget Area Call */
	if( get_post_meta( get_the_ID(), 'manufactory_cf_widget_area', true ) != "" ) {
		$widget_area = get_post_meta( get_the_ID(), 'manufactory_cf_widget_area', true );
	}
	else {
		$widget_area = "sidebar-1";
	}
	
	if( get_post_meta( get_the_ID(), 'manufactory_cf_content_padding', true ) == "off" ) {
		$page_css = " no-padding no-margin";
	}
	else {
		$page_css = " page_spacing";
	}
?>
<main id="main" class="site-main<?php echo esc_attr( $page_css ); ?>">

	<div class="page-content">

		<div class="<?php echo esc_attr( $page_layout_css ); ?>">
			<div class="row">
				<div class="content-area blog-list <?php echo esc_attr( $content_area_css ); ?>">
					<?php
					query_posts('posts_per_page='.get_option('posts_per_page').'&paged='. get_query_var('paged'));

					if ( have_posts() ) :

						// Start the loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'content', get_post_format() );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						// End the loop.
						endwhile;
						
						// Previous/next page navigation.				
						the_posts_pagination( array(
							'prev_text'          => wp_kses( __( '<i class="fa fa-angle-left"></i> Previous', "manufactory" ), array( 'i' => array( 'class' => array() ) ) ),
							'next_text'          => wp_kses( __( 'Next <i class="fa fa-angle-right"></i>', "manufactory" ), array( 'i' => array( 'class' => array() ) ) ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html( 'Page', "manufactory" ) . ' </span>',
						) );
					// If no content, include the "No posts found" template.
					else :
						get_template_part( 'content', 'none' );
						
					endif;
					?>
				</div>			

				<?php
				if( $sidebar_layout != "no_sidebar" && is_active_sidebar( $widget_area ) ) {
					?>
					<div class="widget-area col-md-4 col-sm-4 col-xs-12 <?php echo esc_attr( $sidebar_css . " " . $widget_area ); ?>">
						<?php dynamic_sidebar( $widget_area ); ?>
					</div><!-- End Sidebar -->
					<?php
				}
				?>
			</div>
		</div>
	</div>

</main>

<?php get_footer(); ?>