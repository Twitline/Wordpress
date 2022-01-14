<?php
/**
 * WooCommerce Compatibility File
 * See: https://wordpress.org/plugins/woocommerce/
 *
 * @package Izabel Pro 1.0
 */

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'catch_shop_is_woocommerce_activated' ) ) {
	function catch_shop_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
}

if ( ! function_exists( 'catch_shop_generate_products_array' ) ) {
	/**
	 * Returns list of products to be used in customizer
	 */
	function catch_shop_generate_products_array( $post_type = 'product' ) {
		$output = array();
		$posts = get_posts( array(
			'post_type'        => 'product',
			'post_status'      => 'publish',
			'suppress_filters' => false,
			'posts_per_page'   => -1,
			)
		);

		$output['0']= esc_html__( '-- Select --', 'catch-shop' );

		foreach ( $posts as $post ) {
			/* translators: 1: post id. */
		$output[ $post->ID ] = ! empty( $post->post_title ) ? $post->post_title : sprintf( __( '#%d (no title)', 'catch-shop' ), $post->ID );
		}

		return $output;

	}
}
