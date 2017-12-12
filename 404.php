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
	<div class="container">
		<div class="error-content">
			<h2> <?php esc_html_e('Oops! That page can&rsquo;t be found.', "manufactory"); ?> </h2>
			<p> <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', "manufactory" ); ?></p>
			<a class="go-to-home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'GO BACK HOME PAGE', "manufactory"); ?></a>
		</div>
	</div>
</main>
<?php get_footer(); ?>