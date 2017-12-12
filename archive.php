<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Manufactory
* @since Manufactory 1.0
*/
get_header(); ?>

<main id="main" class="site-main page_spacing">
	<div class="container no-padding">
		<div class="content-area col-md-8 col-sm-8 content-left blog-list">
			<?php
			if ( have_posts() ) :

				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				// End the loop.
				endwhile;

				// Previous/next page navigation.				
				the_posts_pagination( array(
					'prev_text'          => wp_kses( __( '<i class="fa fa-angle-left"></i> Previous', 'manufactory' ), array( 'i' => array( 'class' => array() ) ) ),
					'next_text'          => wp_kses( __( 'Next <i class="fa fa-angle-right"></i>', 'manufactory' ), array( 'i' => array( 'class' => array() ) ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html( 'Page', 'manufactory' ) . ' </span>',
				) );

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );

			endif;
			?>
		</div>
		<div class="widget-area col-md-4 col-sm-4 sidebar-right">
			<?php dynamic_sidebar('sidebar-1'); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>