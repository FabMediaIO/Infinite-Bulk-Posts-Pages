<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://fanaticpixel.com
 * @since      1.0.0
 *
 * @package    Infinite_Bulk_Post
 * @subpackage Infinite_Bulk_Post/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Infinite_Bulk_Post
 * @subpackage Infinite_Bulk_Post/includes
 * @author     Fanatic Pixel <dev@fanaticpixel.com>
 */
class Infinite_Bulk_Post_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'infinite-bulk-post',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
