<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Manufactory
* @since Manufactory 1.0
*/
get_header();

	/* Widget Area */
	if( get_post_meta( get_the_ID(), 'manufactory_cf_sidebar_layout', true ) != "" ) {
		$sidebar_layout = get_post_meta( get_the_ID(), 'manufactory_cf_sidebar_layout', true );
	}
	else {
		$sidebar_layout = "";
	}

	/* Page Layout */
	if( get_post_meta( get_the_ID(), 'manufactory_cf_page_layout', true ) != "" ) {
		$page_layout = get_post_meta( get_the_ID(), 'manufactory_cf_page_layout', true );
	}
	else {
		$page_layout = "";
	}

	if( $page_layout == "fluid" ) {
		$page_layout_css = "container-fluid no-padding";
	}
	else {
		$page_layout_css = "container";
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
		$content_area_css = "content-left col-md-8 col-sm-8";
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
				<div class="content-area <?php echo esc_attr( $content_area_css ); ?>">
					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						// Include the page content template.
						get_template_part( 'content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							?>
							<div class="container no-padding comment-area-page">
								<?php comments_template(); ?>
							</div>
							<?php
						endif;

					// End the loop.
					endwhile;
					?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>