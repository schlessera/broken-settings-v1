<?php
/**
 * Broken Settings v1 SettingsPage Class.
 *
 * @package   AlainSchlesser\BrokenSettings1
 * @author    Alain Schlesser <alain.schlesser@gmail.com>
 * @license   GPL-2.0+
 * @link      https://www.alainschlesser.com/
 * @copyright 2016 Alain Schlesser
 */

namespace AlainSchlesser\BrokenSettings1;

/**
 * Class SettingsPage.
 *
 * @package AlainSchlesser\BrokenSettings1
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class SettingsPage {

	/**
	 * Register the settings page hooks with WordPress.
	 */
	public function register() {
		add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
		add_action( 'admin_init', [ $this, 'settings_init' ] );
	}

	/**
	 * Add a subpage to the Options menu.
	 */
	public function add_admin_menu() {
		add_options_page(
			'as-settings-broken-v1',
			'as-settings-broken-v1',
			'manage_options',
			'as-settings-broken-v1',
			[ $this, 'options_page' ] );
	}

	/**
	 * Initialize the settings data.
	 */
	public function settings_init() {
		register_setting( 'pluginPage', 'assb1_settings' );

		add_settings_section(
			'assb1_pluginPage_section',
			__( 'Useless Name Settings', 'as-settings-broken-v1' ),
			[ $this, 'settings_section_callback' ],
			'pluginPage'
		);

		add_settings_field(
			'assb1_text_field_first_name',
			__( 'First Name', 'as-settings-broken-v1' ),
			[ $this, 'text_field_first_name_render' ],
			'pluginPage',
			'assb1_pluginPage_section'
		);

		add_settings_field(
			'assb1_text_field_last_name',
			__( 'Last Name', 'as-settings-broken-v1' ),
			[ $this, 'text_field_last_name_render' ],
			'pluginPage',
			'assb1_pluginPage_section'
		);
	}

	/**
	 * Render the text field accepting the first name.
	 */
	public function text_field_first_name_render() {
		$options = get_option( 'assb1_settings' );
		?>
		<input type='text' name='assb1_settings[assb1_text_field_first_name]'
		       value='<?php echo $options['assb1_text_field_first_name']; ?>'>
		<?php
	}

	/**
	 * Render the text field accepting the last name.
	 */
	public function text_field_last_name_render() {
		$options = get_option( 'assb1_settings' );
		?>
		<input type='text' name='assb1_settings[assb1_text_field_last_name]'
		       value='<?php echo $options['assb1_text_field_last_name']; ?>'>
		<?php
	}

	/**
	 * Render callback for the section description.
	 */
	public function settings_section_callback() {
		echo __(
			'These settings store a completely useless pair of first and last names.',
			'as-settings-broken-v1'
		);
	}

	/**
	 * Render callback for the Options menu subpage.
	 */
	public function options_page() {
		?>
		<form action='options.php' method='post'>

			<h2>Broken Settings v1 Settings Page</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php
	}
}
