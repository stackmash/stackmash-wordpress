<?php

/**
 * Fired during plugin activation
 *
 * @link       https://stackmash.com
 * @since      1.0.0
 *
 * @package    Stackmash
 * @subpackage Stackmash/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Stackmash
 * @subpackage Stackmash/includes
 * @author     Stackmash <support@stackmash.com>
 */
class Stackmash_Activator {

	/**
	 * Called when plugin activated.
	 *
	 * Called when plugin activated to add default category names
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if(!get_option('stackmash')) {
			$options = array(
				'user_register' => 'user-registered',
				'publish_post' => 'post-published',
				'publish_page' => 'page-published',
				'wp_insert_comment' => 'new-comment',
				'wp_login_failed' => 'failed-login-attempt',
				'wpcf7_before_send_mail' => 'contact-submission',
				'ninja_forms_after_submission' => 'contact-submission',
				'woocommerce_checkout_update_order_meta' => 'order-placed',
			);

			add_option('stackmash', $options);
		}
	}

}
