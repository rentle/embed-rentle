<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Embed_Rentle {

	/**
	 * Constructor for class
	 * - init hooks
	 *
	 * Embed_Rentle constructor.
	 */
	function __construct() {
		add_action( 'init', [ $this, 'initialize_hooks' ] );
		add_action( 'wp_head', [ $this, 'hook_rentle_js' ] );
	}

	/**
	 * Init hooks
	 */
	public function initialize_hooks() {
		add_shortcode( 'rentle_shop', [ $this, 'rentle_output_render_callback' ] );
		add_shortcode( 'twice_commerce_shop', [ $this, 'rentle_output_render_callback' ] );
	}

	/**
	 * Adds rentle.io script to head, if there is rentle block or shortcode added to page
	 *
	 * @return void
	 */
	public function hook_rentle_js() {
		global $post;

		// Ensure $post is available and is an instance of WP_Post
		if ( ! isset( $post ) || ! $post instanceof WP_Post ) {
			return;
		}

		// Check if the post has the specific block or shortcode
		if ( ! has_block( 'embed-rentle/shop-block', $post->ID ) && ! has_shortcode( $post->post_content, 'rentle_shop' ) && ! has_shortcode( $post->post_content, 'twice_commerce_shop' ) ) {
			return;
		}
		?>
		<script type="text/javascript" src="https://cdn.rentle.io/embed/bundle.js" defer></script>
		<?php
	}

	/**
	 * Used to output shortcode content
	 *
	 * @param $attributes
	 *
	 * @return false|string
	 */
	public function rentle_output_render_callback( $attributes ) {
		ob_start(); // Turn on output buffering

		Rentle_Content_Creator::create_rentle_content( $attributes );

		$output = ob_get_contents(); // collect output
		ob_end_clean(); // Turn off ouput buffer

		return $output; // Print output
	}
}

$rentle = new Embed_Rentle();
