<?php

/**
 * @link              https://stackmash.com
 * @since             1.0.0
 * @package           Stackmash
 *
 * @wordpress-plugin
 * Plugin Name:       Stackmash
 * Plugin URI:        https://stackmash.com/docs/wordpress
 * Description:       Stackmash for Wordpress
 * Version:           1.0.0
 * Author:            Stackmash
 * Author URI:        https://stackmash.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       stackmash
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-stackmash-activator.php
 */
function activate_stackmash() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-stackmash-activator.php';
	Stackmash_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-stackmash-deactivator.php
 */
function deactivate_stackmash() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-stackmash-deactivator.php';
	Stackmash_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_stackmash' );
register_deactivation_hook( __FILE__, 'deactivate_stackmash' );

/**
 * Include the Stackmash action function.
 */
require plugin_dir_path( __FILE__ ) . 'stackmash-action.php';

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-stackmash.php';

/**
 * Include the webhooks so we can send notifications.
 */
require plugin_dir_path( __FILE__ ) . 'webhooks/class-stackmash-webhooks.php';

new Stackmash_Webhooks();

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_stackmash()
{
	$plugin = new Stackmash();
	$plugin->run();
}

run_stackmash();