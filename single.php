<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Manufactory
* @since Manufactory 1.0
*/
get_header();

	$post_layout = get_post_meta( get_the_ID(), 'manufactory_cf_page_layout', true );

	if( $post_layout != "fluid" ) {
		$post_layout_css = "container no-padding";
	}
	else {
		$post_layout_css = "container-fluid no-padding";
	}

	/* Content Area */

	$sidebar_layout = get_post_meta( get_the_ID(), 'manufactory_cf_sidebar_layout', true );

	if( $sidebar_layout == "right_sidebar" ) {
		$content_area_css = "content-left col-md-8 col-sm-8";
	}
	elseif( $sidebar_layout == "left_sidebar" ) {
		$content_area_css = "content-right col-md-8 col-sm-8";
	}
	elseif( $sidebar_layout == "no_sidebar" ) {
		$content_area_css = "full-content col-md-12";
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
?>
<main id="main" class="site-main<?php echo esc_attr( $page_css ); ?>">
	<div class="post-content">
		<div class="<?php echo esc_attr( $post_layout_css ); ?>">
			<div class="content-area blog-list  blog-single <?php echo esc_attr( $content_area_css ); ?>">
				<?php
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
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>