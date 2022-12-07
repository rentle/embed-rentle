<?php
/**
 * Plugin Name: Rentle - Easy Rental Booking System
 * Plugin URI: https://wordpress.org/plugins/embed-rentle/
 * Description: Rentle WordPress plugin to insert Rentle booking system on your web site.
 * Author: rentle
 * Author URI: https://www.rentle.io/
 * Version: 1.2.1
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
