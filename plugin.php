<?php
/**
 * Plugin Name: Embed Rentle
 * Plugin URI: https://github.com/ahmadawais/create-guten-block/
 * Description: Rentle WordPress plugin to insert Rentle booking system on your web site.
 * Author: luuptek
 * Author URI: https://www.luuptek.fi
 * Version: 1.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
