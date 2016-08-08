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
 */

namespace AlainSchlesser\BrokenSettings1;

/**
 * Class Plugin.
 *
 * This class hooks our plugin into the WordPress life-cycle.
 *
 * @package AlainSchlesser\BrokenSettings1
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class Plugin {

	/**
	 * Launch the initialization process.
	 */
	public function init() {
		add_action( 'plugins_loaded', [ $this, 'init_settings_page' ] );
	}

	/**
	 * Initialize Settings page.
	 */
	public function init_settings_page() {
		// Initialize settings page.
		$settings_page = new SettingsPage();
		// Register dependencies.
		add_action( 'init', [ $settings_page, 'register' ] );
	}
}
