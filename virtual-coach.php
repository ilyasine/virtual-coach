<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://labgenz.com/
 * @since             1.0.0
 * @package           Virtual_Coach
 *
 * @wordpress-plugin
 * Plugin Name:       Virtual Coach
 * Plugin URI:        https://skillssystem.com
 * Description:       The Virtual Coach plugin helps users manage their mental health through interactive tools like goal setting, safety planning, and check-ins.
 * Version:           1.0.0
 * Author:            Labgenz
 * Author URI:        https://labgenz.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       virtual-coach
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
define( 'VIRTUAL_COACH_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-virtual-coach-activator.php
 */
function activate_virtual_coach() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-virtual-coach-activator.php';
	Virtual_Coach_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-virtual-coach-deactivator.php
 */
function deactivate_virtual_coach() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-virtual-coach-deactivator.php';
	Virtual_Coach_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_virtual_coach' );
register_deactivation_hook( __FILE__, 'deactivate_virtual_coach' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-virtual-coach.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_virtual_coach() {

	$plugin = new Virtual_Coach();
	$plugin->run();

}
run_virtual_coach();
