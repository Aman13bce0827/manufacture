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
	'post_type' => 'manufactor_service'
);
$current_post_id = $post->ID;
$qry = new WP_Query($args);
$service_grp_txt = get_post_meta( get_the_ID(), 'manufactory_cf_service_grp', true );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="col-md-3 col-sm-4 servicedetail-tab">
		<ul>
			<?php 
				$current_id = $post->ID; 
				$posts = get_posts(array(
					'post_type' => 'manufactor_service',
					'posts_per_page' => -1,
					
				));
				foreach($posts as $post):
					setup_postdata($post); 
					?>
					<li class="<?php if ($current_id == $post->ID) { echo "active";} ?>">
						<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
					</li>
					<?php
				endforeach;
			?>	
		</ul>
		<?php
		 	while ($qry->have_posts()) : $qry->the_post();
			if( $current_post_id === $post->ID ) {
				if( get_post_meta( get_the_ID(), 'manufactory_cf_attachment_id', true ) != "" ) {
					?>
					<div class="callout">
						<a href="<?php echo wp_get_attachment_url( get_post_meta( get_the_ID(), 'manufactory_cf_attachment_id', true ), "" ); ?>">
							<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
						</a>
						<?php echo manufactory_content('<h3>','</h3>',esc_html( get_post_meta( get_the_ID(), 'manufactory_cf_down_title', true ) ) ); ?>
						<?php echo manufactory_content('<p>','</p>',esc_html( get_post_meta( get_the_ID(), 'manufactory_cf_down_info', true ) ) ); ?>
					</div>
					<?php
				}
			}
			 endwhile; 
		?>
	</div>
	<div class="col-md-9 col-sm-8">
		<?php 
			if($qry->have_posts()) {
				while ($qry->have_posts()) : $qry->the_post();
					if( $current_post_id === $post->ID ) {
						?>
						<div class="service-content">
							<div class="row">
								<div class="col-md-7 col-sm-7">	
									<div class="section-header">
										<?php the_title('<h3>','</h3>'); ?>
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
										
										if( get_post_meta( get_the_ID(), 'manufactory_cf_attachment_id', true ) != "" ) {
											?>
											<div class="service-info col-md-10">
												<a href="<?php echo wp_get_attachment_url( get_post_meta( get_the_ID(), 'manufactory_cf_attachment_id', true ), "" ); ?>">
													<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
												</a>
												<span><?php echo esc_html( get_post_meta( get_the_ID(), 'manufactory_cf_down_info_sec', true ) ); ?></span>
											</div>
											<?php
										}
									?>
									
								</div>
								<div class="col-md-5 col-sm-5 servicedetail-images">
									<?php
										$ary_imgs = get_post_meta( get_the_ID(), 'manufactory_cf_service_imglist', true );
										foreach ( (array) $ary_imgs as $attachment_id => $attachment_url ) {
											echo wp_get_attachment_image( $attachment_id, "manufactory-352-371" );
										}
									?>
								</div>
							</div>
						</div>
						<div class="accordion-section">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<?php
									$count = 1;
									foreach ( (array) $service_grp_txt as $key => $value ) {	
									
										if ( isset( $value['single_title'] ) && isset($value['single_value'] ) ) {
											?>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="accordion_<?php echo esc_attr($count); ?>">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion<?php echo esc_attr($count); ?>" aria-expanded="true" aria-controls="accordion<?php echo esc_attr($count); ?>"><?php echo esc_html( $value['single_title'] ); ?></a>
													</h4>
												</div>
												<div id="accordion<?php echo esc_attr($count); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion<?php echo esc_attr($count); ?>">
													<div class="panel-body">
														<?php echo wpautop( $value['single_value'] ); ?>
													</div>
												</div>
											</div>
											<?php
										$count++;
										}
									}
								?>
							</div>
						</div>
						<?php 
					}
				endwhile; 
			}
		?>
	</div>
</div>
<div class="clearfix"></div>