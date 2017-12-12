<?php
/**
 * Set WooCommerce image dimensions upon theme activation
 * @since 1.0
 */
if ( ! function_exists( 'manufactory_image_dimensions' ) ) {

	function manufactory_image_dimensions() {

		global $pagenow;

		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}

		$catalog = array(
			'width'  => '270', // px
			'height' => '343', // px
			'crop'	 => 1
		);

		$single = array(
			'width'  => '360', // px
			'height' => '470', // px
			'crop'	 => 1
		);

		$thumbnail = array(
			'width' 	=> '270', // px
			'height'	=> '345', // px
			'crop'		=> 1
		);

		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
		update_option( 'shop_single_image_size', $single ); // Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
	}
	add_action( 'after_switch_theme', 'manufactory_image_dimensions', 1 );
}

add_filter( 'loop_shop_columns', 'manufactory_loop_shop_columns', 1, 10 );

/*
* Return a new number of maximum columns for shop archives
* @param int Original value
* @return int New number of columns
*/
function manufactory_loop_shop_columns( $number_columns ) {
	return 3;
}

add_filter( 'woocommerce_output_related_products_args', 'manufactory_related_products_args' );
function manufactory_related_products_args( $args ) {

	$args['posts_per_page']     = 3; // 3 related products
	$args['columns']            = 3; // arranged in columns

	return $args;
}