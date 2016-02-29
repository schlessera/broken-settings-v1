<?php
/**
 * Broken Settings v1 Plugin Class.
 *
 * @package   AlainSchlesser\BrokenSettings1
 * @author    Alain Schlesser <alain.schlesser@gmail.com>
 * @license   GPL-2.0+
 * @link      https://www.alainschlesser.com/
 * @copyright 2016 Alain Schlesser
 */

namespace AlainSchlesser\BrokenSettings1;

/**
 * Class Plugin.
 *
 * @package AlainSchlesser\BrokenSettings1
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class Plugin {

	/**
	 * Static instance of the plugin.
	 *
	 * @var Plugin
	 */
	protected static $instance;

	/**
	 * Get a reference to the Plugin instance.
	 *
	 * @return Plugin
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Launch the initialization process.
	 */
	public function run() {
		add_action( 'init', [ $this, 'init_settings_page' ] );
	}

	/**
	 * Initialize Settings page.
	 */
	public function init_settings_page() {
		// Initialize settings page.
		$settings_page = new SettingsPage();
		// Register dependencies.
		add_action( 'init', [ $settings_page, 'register' ], 99, 1 );
	}
}
