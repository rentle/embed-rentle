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
	 *
	 * 1. Add assets
	 */
	public function initialize_hooks() {
		$this->register_assets();
		add_shortcode( 'rentle_shop', [ $this, 'rentle_output_render_callback' ] );
	}

	public function hook_rentle_js() {
		global $post;
		if ( ! has_block( 'embed-rentle/shop-block', $post->ID ) && ! has_shortcode( $post->post_content, 'rentle_shop' ) ) {
			return;
		}
		?>
		<script type="text/javascript" src="https://cdn.rentle.io/embed/bundle.js" defer></script>
		<?php
	}

	public function register_assets() {
		// Register block styles for both frontend + backend.
		wp_register_style(
			'embed_rentle-style-css', // Handle.
			plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ), // Block style CSS.
			is_admin() ? array( 'wp-editor' ) : null, // Dependency to include the CSS after it.
			null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
		);

		// Register block editor script for backend.
		wp_register_script(
			'embed_rentle-block-js', // Handle.
			plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
			null, // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
			true // Enqueue the script in the footer.
		);

		// Register block editor styles for backend.
		wp_register_style(
			'embed_rentle-block-editor-css', // Handle.
			plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
			array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
			null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
		);

		// WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
		wp_localize_script(
			'embed_rentle-block-js',
			'cgbGlobal', // Array containing dynamic data for a JS Global.
			[
				'pluginDirPath' => plugin_dir_path( __DIR__ ),
				'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
				// Add more data here that you want to access from `cgbGlobal` object.
			]
		);

		/**
		 * Register Gutenberg block on server-side.
		 *
		 * Register the block on server-side to ensure that the block
		 * scripts and styles for both frontend and backend are
		 * enqueued when the editor loads.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
		 * @since 1.16.0
		 */
		register_block_type(
			'embed-rentle/shop-block', array(
				// Enqueue blocks.style.build.css on both frontend & backend.
				'style'           => 'embed_rentle-style-css',
				// Enqueue blocks.build.js in the editor only.
				'editor_script'   => 'embed_rentle-block-js',
				// Enqueue blocks.editor.build.css in the editor only.
				'editor_style'    => 'embed_rentle-block-editor-css',
				// PHP rendering callback
				'render_callback' => [ $this, 'rentle_output_render_callback' ],
			)
		);
	}

	public function rentle_output_render_callback( $attributes ) {
		ob_start(); // Turn on output buffering

		Rentle_Content_Creator::create_rentle_content( $attributes );

		$output = ob_get_contents(); // collect output
		ob_end_clean(); // Turn off ouput buffer

		return $output; // Print output
	}
}

include_once plugin_dir_path( __FILE__ ) . '../library/embed-rentle-classes.php';

$rentle = new Embed_Rentle();
