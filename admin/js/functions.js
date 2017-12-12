(function($) {

	/* Event - Document Ready */	
	$(document).ready(function($) {

		/* Disable : Page Editor */
		if( $('body.post-type-page #postdivrich').length && $('select#page_template').length ) {

			/* Sidebar Layout */
			if( $('select#page_template').val() != 'default' ) {
				$('body.post-type-page #postdivrich').slideUp(500);
			}

			$('select#page_template').live('change', function() {

				/* Sidebar Layout */
				if( $('select#page_template').val() != 'default' ) {
					$('body.post-type-page #postdivrich').slideUp(500);
				}
				else {
					$('body.post-type-page #postdivrich').slideDown(500);
					$(window).scrollTop($(window).scrollTop()+1);
				}

			});
		}

		/* Post : Formats */
		if( $('#post-formats-select').length ) {

			if( $('input[id="post-format-video"]').is(':checked') ) {
				$('#manufactory_cf_metabox_post_video').slideDown(500); /* Enable Video */
				$('#manufactory_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#manufactory_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
			else if( $('input[id="post-format-quote"]').is(':checked') ) {
				$('#manufactory_cf_metabox_post_video').slideUp(500); /* Disable Video */
				$('#manufactory_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#manufactory_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
			else if( $('input[id="post-format-gallery"]').is(':checked') ) {
				$('#manufactory_cf_metabox_post_video').slideUp(500); /* Disable Video */
				$('#manufactory_cf_metabox_post_gallery').slideDown(500); /* Enable Gallery */
				$('#manufactory_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
			else if( $('input[id="post-format-audio"]').is(':checked') ) {
				$('#manufactory_cf_metabox_post_video').slideUp(500); /* Disable Video */
				$('#manufactory_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#manufactory_cf_metabox_post_audio').slideDown(500); /* Enable Audio */
			}
			else {
				$('#manufactory_cf_metabox_post_video').slideUp(500); /* Disable Video */
				$('#manufactory_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#manufactory_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}

			/* On Change : Event */
			$('#post-formats-select').live('change', function() {
				if( $('input[id="post-format-video"]').is(':checked') ) {
					$('#manufactory_cf_metabox_post_video').slideDown(500); /* Enable Video */
					$('#manufactory_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#manufactory_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				}
				else if( $('input[id="post-format-quote"]').is(':checked') ) {
					$('#manufactory_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#manufactory_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#manufactory_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				}
				else if( $('input[id="post-format-gallery"]').is(':checked') ) {
					$('#manufactory_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#manufactory_cf_metabox_post_gallery').slideDown(500); /* Enable Gallery */
					$('#manufactory_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				} 
				else if( $('input[id="post-format-audio"]').is(':checked') ) {
					$('#manufactory_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#manufactory_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#manufactory_cf_metabox_post_audio').slideDown(500); /* Enable Audio */
				}
				else {
					$('#manufactory_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#manufactory_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#manufactory_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				}
			});
		}

		/* Post : Video */
		if( $('#manufactory_cf_post_video_source').val() == 'video_link' ) {
			$('.cmb2-id-manufactory-cf-post-video-link').slideDown(500); /* Enable Video Link */
			$('.cmb2-id-manufactory-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-manufactory-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}
		else if ( $('#manufactory_cf_post_video_source').val() == 'video_embed_code' ) {
			$('.cmb2-id-manufactory-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-manufactory-cf-post-video-embed').slideDown(500); /* Enable Embed */
			$('.cmb2-id-manufactory-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}
		else if ( $('#manufactory_cf_post_video_source').val() == 'video_upload_local' ) {
			$('.cmb2-id-manufactory-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-manufactory-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-manufactory-cf-post-video-local').slideDown(500); /* Enable Video Local */
		}
		else {
			$('.cmb2-id-manufactory-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-manufactory-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-manufactory-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}

		/* On Change : Event */
		$('#manufactory_cf_post_video_source').live('change', function() {

			if( $('#manufactory_cf_post_video_source').val() == 'video_link' ) {
				$('.cmb2-id-manufactory-cf-post-video-link').slideDown(500); /* Enable Video Link */
				$('.cmb2-id-manufactory-cf-post-video-embed').slideUp(500); /* Disable Embed */
				$('.cmb2-id-manufactory-cf-post-video-local').slideUp(500); /* Disable Video Local */
			}
			else if ( $('#manufactory_cf_post_video_source').val() == 'video_embed_code' ) {
				$('.cmb2-id-manufactory-cf-post-video-link').slideUp(500); /* Disable Video Link */
				$('.cmb2-id-manufactory-cf-post-video-embed').slideDown(500); /* Enable Embed */
				$('.cmb2-id-manufactory-cf-post-video-local').slideUp(500); /* Disable Video Local */
			}
			else if ( $('#manufactory_cf_post_video_source').val() == 'video_upload_local' ) {
				$('.cmb2-id-manufactory-cf-post-video-link').slideUp(500); /* Disable Video Link */
				$('.cmb2-id-manufactory-cf-post-video-embed').slideUp(500); /* Disable Embed */
				$('.cmb2-id-manufactory-cf-post-video-local').slideDown(500); /* Enable Video Local */
			}
			else {
				$('.cmb2-id-manufactory-cf-post-video-link').slideUp(500);
				$('.cmb2-id-manufactory-cf-post-video-embed').slideUp(500);
				$('.cmb2-id-manufactory-cf-post-video-local').slideUp(500);
			}
		});

		/* Post : Audio */
		if( $('#manufactory_cf_post_audio_source').val() == 'soundcloud_link' ) {
			$('.cmb2-id-manufactory-cf-post-soundcloud-url').slideDown(500); /* Enable Soundcloud URL */
			$('.cmb2-id-manufactory-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
		}
		else if ( $('#manufactory_cf_post_audio_source').val() == 'audio_upload_local' ) {
			$('.cmb2-id-manufactory-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
			$('.cmb2-id-manufactory-cf-post-audio-local').slideDown(500); /* Disable Audio Local */
		}
		else {
			$('.cmb2-id-manufactory-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
			$('.cmb2-id-manufactory-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
		}

		/* On Change : Event */
		$('#manufactory_cf_post_audio_source').live('change', function() {
			if( $('#manufactory_cf_post_audio_source').val() == 'soundcloud_link' ) {
				$('.cmb2-id-manufactory-cf-post-soundcloud-url').slideDown(500); /* Enable Soundcloud URL */
				$('.cmb2-id-manufactory-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
			}
			else if ( $('#manufactory_cf_post_audio_source').val() == 'audio_upload_local' ) {
				$('.cmb2-id-manufactory-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
				$('.cmb2-id-manufactory-cf-post-audio-local').slideDown(500); /* Disable Audio Local */
			}
			else {
				$('.cmb2-id-manufactory-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
				$('.cmb2-id-manufactory-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
			}
		});

		/* Page : Metabox */
		if( $('#manufactory_cf_metabox_page').length  ) {

			/* Header Background Color */
			if( $('select#manufactory_cf_page_title').val() != 'enable' ) {
				$('.cmb2-id-manufactory-cf-page-header-img').slideUp(500);
			}

			$('#manufactory_cf_page_title').live('change', function() {

				/* Header Background Image */
				if( $('select#manufactory_cf_page_title').val() == 'disable' ) {
					$('.cmb2-id-manufactory-cf-page-header-img').slideUp(500);
				}
				else {
					$('.cmb2-id-manufactory-cf-page-header-img').slideDown(500);
				}
			});

			/* Sidebar Layout - Page */
			if( $('select#manufactory_cf_sidebar_layout').val() == 'no_sidebar' ) {
				$('.cmb2-id-manufactory-cf-widget-area').slideUp(500);
			}

			$('select#manufactory_cf_sidebar_layout').live('change', function() {

				/* Sidebar Layout - Page */
				if( $('select#manufactory_cf_sidebar_layout').val() == 'no_sidebar' ) {
					$('.cmb2-id-manufactory-cf-widget-area').slideUp(500);
				}
				else {
					$('.cmb2-id-manufactory-cf-widget-area').slideDown(500);
				}

			});
		}
	});
})(jQuery);