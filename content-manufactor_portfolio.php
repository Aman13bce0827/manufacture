<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Manufactory
 * @since Manufactory 1.0
 */
 
$args = array(
	'post_type' => 'manufactor_portfolio'
);
$qry = new WP_Query($args);
$portfolio_grp_txt = get_post_meta( get_the_ID(), 'manufactory_cf_portfolio_grp', true );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="projectsingle">
		<div class="col-md-4 col-sm-6 projectsingle-content_part">
			<div class="section-header">
				<h3><?php esc_html_e('Project Description',"manufactory"); ?></h3>
			</div>
			<?php 				 
				/* translators: %s: Name of current post */
				the_content( sprintf(
					esc_html__( 'Continue reading %s', "manufactory" ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', "manufactory" ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', "manufactory" ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
				
				if( get_post_meta( get_the_ID(), 'manufactory_cf_project_challenge', true ) != "" ) {
					?>
					<h3><?php esc_html_e('Project Challenge',"manufactory"); ?></h3>
					<?php 
					echo wpautop( get_post_meta( get_the_ID(), 'manufactory_cf_project_challenge', true ) ); 
				}
				if( get_post_meta( get_the_ID(), 'manufactory_cf_result_desc', true ) != "" ) {
					?>
					<h3><?php esc_html_e('Result',"manufactory"); ?></h3>
					<?php 
					echo wpautop( get_post_meta( get_the_ID(), 'manufactory_cf_result_desc', true ) ); 
				}
				if( get_post_meta( get_the_ID(), 'manufactory_cf_portfolio_grp', true ) != '' ) {
					?>
					<ul class="project-result">
						<?php
							foreach ( (array) $portfolio_grp_txt as $key => $value ) {	
								if ( isset( $value['single_title'] ) && isset($value['single_value'] ) ) {
									?>
									<li>
										<h4><?php echo esc_html( $value['single_title'] ); ?></h4>
										<span><?php echo esc_html( $value['single_value'] ); ?></span>
									</li>
									<?php
								}
							}
						?>
					</ul>
					<?php
				}
			?>
			<div class="portfolio-socail-share">
				<h4><?php esc_html_e('Share This',"manufactory"); ?></h4>
				<ul class="projectsingle-social">
					<li><a href="javascript: void(0)" data-action="twitter" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-twitter"></i></a></li>
					<li><a href="javascript: void(0)" data-action="facebook" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-facebook"></i></a></li>
					<li><a href="javascript: void(0)" data-action="dribbble" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-dribbble"></i></a>
					<li><a href="javascript: void(0)" data-action="linkedin" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-8 col-sm-6 projectsingle-img_part">
			<?php
				$ary_imgs = get_post_meta( get_the_ID(), 'manufactory_cf_portfolio_imglist', true );
				foreach ( (array) $ary_imgs as $attachment_id => $attachment_url ) {
					echo wp_get_attachment_image( $attachment_id, "manufactory-740-540" );
				}
			
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '', 'manufactory' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Next Project', 'manufactory' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '', 'manufactory' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Previous Project', 'manufactory' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			?>
		</div>
	</div>
</div>
<div class="clearfix"></div>