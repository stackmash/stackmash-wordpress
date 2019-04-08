<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://stackmash.com
 * @since      1.0.0
 *
 * @package    Stackmash
 * @subpackage Stackmash/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Stackmash
 * @subpackage Stackmash/admin
 * @author     Stackmash <support@stackmash.com>
 */
class Stackmash_Admin
{
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/stackmash-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/stackmash-admin.js', array( 'jquery' ), $this->version, false );
	}

	public function add_plugin_admin_menu()
	{
		add_menu_page('Stackmash', 'Stackmash', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'), "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzOTEuMzkgMjQzLjg3Ij48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6IzM0MjhkMjt9PC9zdHlsZT48L2RlZnM+PHRpdGxlPmljb248L3RpdGxlPjxnIGlkPSJMYXllcl8yIiBkYXRhLW5hbWU9IkxheWVyIDIiPjxnIGlkPSJMYXllcl8xLTIiIGRhdGEtbmFtZT0iTGF5ZXIgMSI+PGcgaWQ9IkxheWVyXzEtMi0yIiBkYXRhLW5hbWU9IkxheWVyIDEtMiI+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMTY0LjEsMjMwLjQzSDEzNi41NGMtOS42NCwwLTEzLjk1LTguNTctOS41Ny0xOWw3NC44LTE3OWM0LjM4LTEwLjQ4LDE1Ljg1LTE5LDI1LjUtMTloMjcuNTVjOS42NSwwLDE0LDguNTgsOS41OCwxOWwtNzQuODEsMTc5QzE4NS4yMiwyMjEuODYsMTczLjc0LDIzMC40MywxNjQuMSwyMzAuNDNaIi8+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMTY0LjEsMjQzLjg3SDEzNi41NGMtOC42NSwwLTE2LjE3LTMuODQtMjAuNjItMTAuNTQtNS03LjQ1LTUuNDQtMTcuMzMtMS4zNC0yNy4xbDc0Ljc5LTE3OUMxOTUuODcsMTEuNzIsMjEyLjE2LDAsMjI3LjI3LDBoMjcuNTVDMjYzLjUsMCwyNzEsMy44NiwyNzUuNSwxMC41OGM0Ljk0LDcuNDcsNS40MSwxNy4zNSwxLjI3LDI3LjFMMjAyLDIxNi41N0MxOTUuNSwyMzIuMTMsMTc5LjIxLDI0My44NywxNjQuMSwyNDMuODdaTTEzOS4yMSwyMTdIMTY0LjFjMy40NiwwLDEwLjQ4LTQuNTMsMTMuMS0xMC43OEwyNTIsMjcuMjZsLjE1LS4zOUgyMjcuMjdjLTMuNDcsMC0xMC41LDQuNTEtMTMuMTEsMTAuNzVsLTc0Ljc5LDE3OUMxMzkuMzEsMjE2Ljc0LDEzOS4yNiwyMTYuODcsMTM5LjIxLDIxN1ptLTIuODYsMFoiLz48cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik01Mi4yOCwyMzAuNDNIMjQuNzJjLTkuNjQsMC0xMy45NS04LjU3LTkuNTctMTlMOTAsMzIuNDRjNC4zOC0xMC40OCwxNS44NS0xOSwyNS41LTE5SDE0M2M5LjY1LDAsMTQsOC41OCw5LjU4LDE5bC03NC44MywxNzlDNzMuNCwyMjEuODYsNjEuOTIsMjMwLjQzLDUyLjI4LDIzMC40M1oiLz48cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik01Mi4yOCwyNDMuODdIMjQuNzJjLTguNjUsMC0xNi4xNy0zLjg0LTIwLjYyLTEwLjU0LTQuOTUtNy40NS01LjQ0LTE3LjMzLTEuMzQtMjcuMWw3NC43OS0xNzlDODQuMDUsMTEuNzIsMTAwLjM0LDAsMTE1LjQ1LDBIMTQzYzguNjgsMCwxNi4yMiwzLjg2LDIwLjY4LDEwLjU4LDQuOTQsNy40Nyw1LjQxLDE3LjM1LDEuMjcsMjcuMUw5MC4xOCwyMTYuNTdDODMuNjcsMjMyLjE0LDY3LjM4LDI0My44Nyw1Mi4yOCwyNDMuODdaTTI3LjM5LDIxN0g1Mi4yOGMzLjQ2LDAsMTAuNDktNC41MywxMy4xMS0xMC43OWw3NC44My0xNzljLjA1LS4xNC4xMS0uMjcuMTUtLjM5SDExNS40NWMtMy40NywwLTEwLjUsNC41MS0xMy4xMSwxMC43NWwtNzQuNzksMTc5QzI3LjQ5LDIxNi43NCwyNy40NCwyMTYuODcsMjcuMzksMjE3Wm0tMi44NiwwWk0xNDMuMjMsMjYuODhaIi8+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMjc1LjkyLDI0My44N0gyNDguMzZjLTguNjgsMC0xNi4yMi0zLjg2LTIwLjY3LTEwLjU5LTQuOTUtNy40Ny01LjQxLTE3LjM1LTEuMjYtMjcuMUwzMDEuMTksMjcuMjZDMzA3LjY5LDExLjcyLDMyNCwwLDMzOS4wOSwwaDI3LjU1YzguNjgsMCwxNi4yMiwzLjg2LDIwLjY4LDEwLjU4LDQuOTQsNy40Nyw1LjQxLDE3LjM1LDEuMjcsMjcuMUwzMTMuODEsMjE2LjU3QzMwNy4yNywyMzIuMTQsMjkxLDI0My44NywyNzUuOTIsMjQzLjg3Wk0yNTEsMjE3aDI0Ljg5YzMuNDUsMCwxMC40Ny00LjU0LDEzLjExLTEwLjgxbDc0LjgtMTc4LjkzYy4wNS0uMTQuMTEtLjI3LjE1LS4zOUgzMzkuMDljLTMuNDcsMC0xMC41LDQuNTEtMTMuMTEsMTAuNzVsLTc0Ljc5LDE3OUMyNTEuMTMsMjE2Ljc0LDI1MS4wOCwyMTYuODcsMjUxLDIxN1oiLz48L2c+PC9nPjwvZz48L3N2Zz4=");
	}

	public function add_action_links($links)
	{
		$settings_link = [
			'<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>',
		];

		return array_merge(  $settings_link, $links );
	}

	public function display_plugin_setup_page()
	{
		$options = get_option($this->plugin_name);

		include_once('partials/stackmash-admin-display.php');
	}

	public function validate($input)
	{
		$options = get_option($this->plugin_name);

		$validInput = [];

		if(isset($options['public_key']))
			$validInput['public_key'] = $options['public_key'];

		if(isset($options['private_key']))
			$validInput['private_key'] = $options['private_key'];

		if(isset($options['user_register']))
			$validInput['user_register'] = $options['user_register'];

		if(isset($options['publish_post']))
			$validInput['publish_post'] = $options['publish_post'];

		if(isset($options['publish_page']))
			$validInput['publish_page'] = $options['publish_page'];

		if(isset($options['wp_insert_comment']))
			$validInput['wp_insert_comment'] = $options['wp_insert_comment'];

		if(isset($options['wp_login_failed']))
			$validInput['wp_login_failed'] = $options['wp_login_failed'];

		if(isset($options['wpcf7_before_send_mail']))
			$validInput['wpcf7_before_send_mail'] = $options['wpcf7_before_send_mail'];

		if(isset($options['ninja_forms_after_submission']))
			$validInput['ninja_forms_after_submission'] = $options['ninja_forms_after_submission'];

		if(isset($options['woocommerce_checkout_update_order_meta']))
			$validInput['woocommerce_checkout_update_order_meta'] = $options['woocommerce_checkout_update_order_meta'];

		if(isset($_POST['project_settings']))
		{
			$validInput['public_key'] = sanitize_text_field($input['public_key']);
			$validInput['private_key'] = sanitize_text_field($input['private_key']);
		}

		if(isset($_POST['category_settings']))
		{
			$validInput['user_register'] = sanitize_text_field($input['user_register']);
			$validInput['publish_post'] = sanitize_text_field($input['publish_post']);
			$validInput['publish_page'] = sanitize_text_field($input['publish_page']);
			$validInput['wp_insert_comment'] = sanitize_text_field($input['wp_insert_comment']);
			$validInput['wp_login_failed'] = sanitize_text_field($input['wp_login_failed']);
		}

		if(isset($_POST['plugin_settings']))
		{
			$validInput['wpcf7_before_send_mail'] = sanitize_text_field($input['wpcf7_before_send_mail']);
			$validInput['ninja_forms_after_submission'] = sanitize_text_field($input['ninja_forms_after_submission']);
			$validInput['woocommerce_checkout_update_order_meta'] = sanitize_text_field($input['woocommerce_checkout_update_order_meta']);
		}

		return $validInput;
	}

	public function options_update()
	{
		register_setting($this->plugin_name, $this->plugin_name, [$this, 'validate']);
	}
}