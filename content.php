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
$str = get_the_content();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<span class="sticky-post"><?php esc_html_e( 'Featured', 'manufactory' ); ?></span>
	<?php endif; 
	
	$post_format = get_post_format();
	if( $post_format == "gallery" && count( get_post_meta( get_the_ID(), 'manufactory_cf_post_gallery', 1 ) ) > 0 && is_array( get_post_meta( get_the_ID(), 'manufactory_cf_post_gallery', 1 ) ) ) {
		?>
		<div class="entry-cover">
			<div id="blog-carousel-<?php echo the_ID(); ?>" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<?php
					$active=1;
					foreach ( (array) get_post_meta( get_the_ID(), 'manufactory_cf_post_gallery', 1 ) as $attachment_id => $attachment_url ) {
						?>
						<div class="item<?php if( $active == 1 ) { echo ' active'; } ?>">
							<?php echo wp_get_attachment_image( $attachment_id, 'manufactory-791-423' ); ?>
						</div>
						<?php
						$active++;
					} ?>
				</div>
				<a title="Previous" class="left carousel-control" href="#blog-carousel-<?php echo the_ID(); ?>" role="button" data-slide="prev">
					<span class="fa fa-chevron-left" aria-hidden="true"></span>
				</a>
				<a title="Next" class="right carousel-control" href="#blog-carousel-<?php echo the_ID(); ?>" role="button" data-slide="next">
					<span class="fa fa-chevron-right" aria-hidden="true"></span>
				</a>
			</div>
		</div>
		<?php
	}
	if( is_single() ) :
		?>
		<div class="blog-single">
			<?php
				/* Post Format : Video */
			if( $post_format == "video" ) {

				if( get_post_meta( get_the_ID(), 'manufactory_cf_post_video_source', 1 ) == "video_link" && get_post_meta( get_the_ID(), 'manufactory_cf_post_video_link', 1 ) != "" ) {
					echo wp_oembed_get( esc_url( get_post_meta( get_the_ID(), 'manufactory_cf_post_video_link', true ) ) );
				}
				elseif( get_post_meta( get_the_ID(), 'manufactory_cf_post_video_source', 1 ) == "video_embed_code" && get_post_meta( get_the_ID(), 'manufactory_cf_post_video_embed', 1 ) != "" ) {
					echo get_post_meta( get_the_ID(), 'manufactory_cf_post_video_embed', 1 );
				}
				elseif( get_post_meta( get_the_ID(), 'manufactory_cf_post_video_source', 1 ) == "video_upload_local" && get_post_meta( get_the_ID(), 'manufactory_cf_post_video_local', 1 ) != "" ) {
					?>
					<video controls>
						<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'manufactory_cf_post_video_local', 1 ) ); ?>" type="video/mp4">
						<?php esc_html_e("Your browser does not support the video tag.","manufactory"); ?>
					</video> 
					<?php			
				}
			}

			/* Post Format : Audio */
			if( $post_format == "audio" ) {

				if( get_post_meta( get_the_ID(), 'manufactory_cf_post_audio_source', 1 ) == "soundcloud_link" && get_post_meta( get_the_ID(), 'manufactory_cf_post_soundcloud_url', 1 ) != "" ) {
					?>
					<iframe src="<?php echo esc_url( get_post_meta( get_the_ID(), 'manufactory_cf_post_soundcloud_url', 1 ) ); ?>"></iframe>
					<?php
				}
				elseif( get_post_meta( get_the_ID(), 'manufactory_cf_post_audio_source', 1 ) == "audio_upload_local" && get_post_meta( get_the_ID(), 'manufactory_cf_post_audio_local', 1 ) != "" ) {
					?>
					<audio controls>
						<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'manufactory_cf_post_audio_local', 1 ) ); ?>" type="audio/mpeg">
						<?php esc_html_e("Your browser does not support the audio element.","manufactory"); ?>
					</audio>
					<?php
				}
			}
	
			if( has_post_thumbnail() && ( $post_format != "audio" && $post_format != "video" && $post_format != "gallery" ) ) {
				?>
				<div class="entry-cover">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php
			}
			else {
				// Do nothing...
			}
			
			?>
			<div class="entry-meta">
				<div class="post-like">
					<span class="post-view post-likes">
						<?php if( function_exists('manufactory_get_simple_likes_button') ) { echo manufactory_get_simple_likes_button( get_the_ID() ); } ?>
					</span>
				</div>
				<div class="post-comment">
					<span class="icon icon-Message"></span><a href="<?php comments_link(); ?>"><?php comments_number(esc_html__( '0', "manufactory" ), esc_html__( '1', "manufactory" ),esc_html__( '% Comments', "manufactory" )); ?></a>
				</div>
				<?php
					if( has_tag() ) {
						?>
						<div class="post-tag">
							<span class="icon icon-Tag"></span><?php the_tags(); ?>
						</div>
						<?php
					}
				?>
				<div class="post-share social-icon-share">
					<span class="icon icon-Share"></span>
					<span><?php esc_html_e('Share It',"manufactory"); ?></span>		
					<ul>	
						<li><a href="javascript: void(0)" data-action="twitter" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-twitter"></i></a></li>
						<li><a href="javascript: void(0)" data-action="facebook" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-facebook"></i></a></li>
						<li><a href="javascript: void(0)" data-action="linkedin" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
				
				<div class="post-date">
					<span><?php echo get_the_date( 'd', get_the_ID() ); ?></span>
					<span><?php echo get_the_date( 'M', get_the_ID() ); ?></span>
				</div>
			</div>
			<div class="entry-block">
				<div class="post-by">
					<span><?php esc_html_e('By - ',"manufactory");?></span>
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
				</div>
							
				<div class="entry-content">
					<?php
						if( is_single() ) {
							/* translators: %s: Name of current post */
							the_content( sprintf(
								esc_html__( 'Continue reading %s', 'manufactory' ),
								the_title( '<span class="screen-reader-text">', '</span>', false )
							) );

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'manufactory' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'manufactory' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
						}
						else {
							echo wp_html_excerpt( $str,300);
						}
					?>
				</div>	
			</div>
			<?php 
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '', 'manufactory' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '', 'manufactory' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			?>			
		</div>
	<?php
	else:
		?>
		<div class="blog-post-inner">
		<?php
			// Get post format
			$post_format = get_post_format();
			
			/* Post Format : Video */
			if( $post_format == "video" ) {

				if( get_post_meta( get_the_ID(), 'manufactory_cf_post_video_source', 1 ) == "video_link" && get_post_meta( get_the_ID(), 'manufactory_cf_post_video_link', 1 ) != "" ) {
					echo wp_oembed_get( esc_url( get_post_meta( get_the_ID(), 'manufactory_cf_post_video_link', true ) ) );
				}
				elseif( get_post_meta( get_the_ID(), 'manufactory_cf_post_video_source', 1 ) == "video_embed_code" && get_post_meta( get_the_ID(), 'manufactory_cf_post_video_embed', 1 ) != "" ) {
					echo get_post_meta( get_the_ID(), 'manufactory_cf_post_video_embed', 1 );
				}
				elseif( get_post_meta( get_the_ID(), 'manufactory_cf_post_video_source', 1 ) == "video_upload_local" && get_post_meta( get_the_ID(), 'manufactory_cf_post_video_local', 1 ) != "" ) {
					?>
					<video controls>
						<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'manufactory_cf_post_video_local', 1 ) ); ?>" type="video/mp4">
						<?php esc_html_e("Your browser does not support the video tag.","manufactory"); ?>
					</video> 
					<?php			
				}
			}

			/* Post Format : Audio */
			if( $post_format == "audio" ) {

				if( get_post_meta( get_the_ID(), 'manufactory_cf_post_audio_source', 1 ) == "soundcloud_link" && get_post_meta( get_the_ID(), 'manufactory_cf_post_soundcloud_url', 1 ) != "" ) {
					?>
					<iframe src="<?php echo esc_url( get_post_meta( get_the_ID(), 'manufactory_cf_post_soundcloud_url', 1 ) ); ?>"></iframe>
					<?php
				}
				elseif( get_post_meta( get_the_ID(), 'manufactory_cf_post_audio_source', 1 ) == "audio_upload_local" && get_post_meta( get_the_ID(), 'manufactory_cf_post_audio_local', 1 ) != "" ) {
					?>
					<audio controls>
						<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'manufactory_cf_post_audio_local', 1 ) ); ?>" type="audio/mpeg">
						<?php esc_html_e("Your browser does not support the audio element.","manufactory"); ?>
					</audio>
					<?php
				}
			}
			
			if( has_post_thumbnail() && ( $post_format != "audio" && $post_format != "video" && $post_format != "gallery" ) ) {
				?>
				<div class="entry-cover">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
					<a href="<?php echo esc_url( get_permalink() ); ?>"><span class="icon_plus" aria-hidden="true"></span></a>
				</div>
				<?php
			}
			?>
			<div class="entry-meta">
				<div class="entrymeta-left">
					<div class="post-like">
						<span class="post-view post-likes">
							<?php if( function_exists('manufactory_get_simple_likes_button') ) { echo manufactory_get_simple_likes_button( get_the_ID() ); } ?>
						</span>
					</div>
					<div class="post-comment">	
						<span class="icon icon-Message"></span><a href="<?php comments_link(); ?>"><?php comments_number(esc_html__( '0', "manufactory" ), esc_html__( '1', "manufactory" ),esc_html__( '% Comments', "manufactory" )); ?></a>
					</div>
					<?php
					if( has_tag() ) {
						?>
						<div class="post-tag">
							<span class="icon icon-Tag"></span><?php the_tags(); ?>
						</div>
						<?php
					}
					?>
					<div class="post-share social-icon-share">
						<span class="icon icon-Share"></span>
						<span><?php esc_html_e('Share It',"manufactory"); ?></span>		
						<ul>	
							<li><a href="javascript: void(0)" data-action="twitter" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-twitter"></i></a></li>
							<li><a href="javascript: void(0)" data-action="facebook" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-facebook"></i></a></li>
							<li class="linkedin"><a href="javascript: void(0)" data-action="linkedin" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="entrymeta-right">
					<div class="post-date">
						<span><?php echo get_the_date( 'd', get_the_ID() ); ?></span>
						<span><?php echo get_the_date( 'M', get_the_ID() ); ?></span>
					</div>
				</div>
			</div>
			<div class="entry-block">
				<div class="post-by">
					<span><?php esc_html_e('By - ',"manufactory");?></span>
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
				</div>				
				<div class="entry-title">
					<a href="<?php echo esc_url( get_permalink() ); ?>">
						<?php the_title('<h3>','</h3>'); ?>
					</a>
				</div>
				<div class="entry-content">
					
					<p> <?php echo wp_html_excerpt( $str,300,'...' ); ?></p>
				</div>
				<div class="single-post-link">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('Read More',"manufactory"); ?><span class="arrow_right" aria-hidden="true"></span></a>
				</div>
			</div>
		</div>
		<?php
	endif;
	?>
</article>
<div class="clearfix"></div>