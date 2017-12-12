<?php
if( get_post_meta( get_the_ID(), 'manufactory_cf_page_header_img', true ) != "" ) {
	$header_image = get_post_meta( get_the_ID(), 'manufactory_cf_page_header_img', true );
}
else {
	$header_image = MANUFACTORY_IMGURI . '/page-banner.jpg';
}

if( get_post_meta( get_the_ID(), 'manufactory_cf_page_title', true ) != "disable" ) :
	?>
	<div class="container-fluid no-padding pagebanner" <?php if( $header_image != "" ) { ?> style="background-image: url(<?php echo esc_url( $header_image ); ?>);"<?php } ?>>
		<div class="page-banner-inner">
			<div class="container">
				<h3>
					<?php
						if( is_home() ) {
							esc_html_e( 'Blog', "manufactory" );
						}
						elseif( is_404() ) {
							esc_html_e( 'Page Not Found', "manufactory" );
						}
						elseif( is_search() ) {
							printf( esc_html__( 'Search Results for: %s', "manufactory" ), get_search_query() );
						}
						elseif( is_archive() ) {
							the_archive_title();
						}
						else {
							the_title();
						} 
					?>
				</h3>
			</div>
		</div>
	</div>
	
	<div class="container-fluid no-padding page-breadcrumb">
		<div class="container">
			<?php
				if( function_exists( 'bcn_display' ) ) {
					?>
					<div class="breadcrumb">
						<?php bcn_display(); ?>
					</div>
					<?php
				}
			?>
		</div>
	</div>
	<?php
endif;
?>