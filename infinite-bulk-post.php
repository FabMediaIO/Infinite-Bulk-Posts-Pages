<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://fanaticpixel.com
 * @since             1.0.0
 * @package           Infinite_Bulk_Post
 *
 * @wordpress-plugin
 * Plugin Name:       Infinite Bulk Post and Pages
 * Plugin URI:        https://fanaticpixel.com/projects/infinite-bulk-post
 * Description:       Create Bulk Post and Pages
 * Version:           1.0.0
 * Author:            Fanatic Pixel
 * Author URI:        https://fanaticpixel.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       infinite-bulk-post
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'INFINITE_BULK_POST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-infinite-bulk-post-activator.php
 */
function activate_infinite_bulk_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-infinite-bulk-post-activator.php';
	Infinite_Bulk_Post_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-infinite-bulk-post-deactivator.php
 */
function deactivate_infinite_bulk_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-infinite-bulk-post-deactivator.php';
	Infinite_Bulk_Post_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_infinite_bulk_post' );
register_deactivation_hook( __FILE__, 'deactivate_infinite_bulk_post' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-infinite-bulk-post.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_infinite_bulk_post() {

	$plugin = new Infinite_Bulk_Post();
	$plugin->run();

}
run_infinite_bulk_post();
