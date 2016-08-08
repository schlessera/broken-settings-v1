<?php
/**
 * Example Code: Settings Page - Broken Implementation v1.
 *
 * This code is part of the article "Using A Config To Write Reusable Code"
 * as published on https://www.alainschlesser.com/.
 *
 * @see       https://www.alainschlesser.com/config-files-for-reusable-code/
 *
 * @package   AlainSchlesser\BrokenSettings1
 * @author    Alain Schlesser <alain.schlesser@gmail.com>
 * @license   GPL-2.0+
 * @link      https://www.alainschlesser.com/
 * @copyright 2016 Alain Schlesser
 *
 * @wordpress-plugin
 * Plugin Name: AS Settings - Broken v1
 * Plugin URI:  https://www.alainschlesser.com/config-files-for-reusable-code/
 * Description: Example Code: Settings Page - Broken Implementation v1
 * Version:     0.1.1
 * Author:      Alain Schlesser
 * Author URI:  https://www.alainschlesser.com/
 * Text Domain: as-settings-broken-v1
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace AlainSchlesser\BrokenSettings1;

use AlainSchlesser\BrokenSettings1\Plugin as BrokenSettings1;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Remember plugin root folder.
if ( ! defined( 'AS_BROKEN_SETTINGS_1_DIR' ) ) {
	define( 'AS_BROKEN_SETTINGS_1_DIR', plugin_dir_path( __FILE__ ) );
}

// Load Composer autoloader.
if ( file_exists( AS_BROKEN_SETTINGS_1_DIR . 'vendor/autoload.php' ) ) {
	require_once AS_BROKEN_SETTINGS_1_DIR . 'vendor/autoload.php';
}

// Initialize the plugin.
( new BrokenSettings1() )->init();
