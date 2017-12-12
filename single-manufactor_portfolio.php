<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Manufactory
* @since Manufactory 1.0
*/
get_header();

?>
<main id="main" class="site-main">
	<div class="post-content">
		<div class="container">
			<div class="content-area">
				<div class="row">
					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						// Include the page content template.
						get_template_part( 'content', 'manufactor_portfolio' );

					// End the loop.
					endwhile;
					?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>