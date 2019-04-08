<?php

/**
 * Stackmash webhooks
 *
 * @link       https://stackmash.com
 * @since      1.0.0
 *
 * @package    Stackmash
 * @subpackage Stackmash/webhooks
 */

if(!defined('ABSPATH'))
{
	exit;
}

/**
 * Stackmash webhook for wp_login_failed.
 *
 * @package    Stackmash
 * @subpackage Stackmash/webhooks
 * @author     Stackmash <support@stackmash.com>
 */
class Stackmash_WP_Login_Failed
{
	public function __construct()
	{
		add_action('wp_login_failed', [$this, 'wp_login_failed'], 99, 2);
	}

	public function wp_login_failed($username)
	{
		// Get the options
		$options = get_option('stackmash');

		$data = [
			'Username' => $username,
		];

		// Create action
		if($options['wp_login_failed'] != '')
		{
			stackmash_action($options['wp_login_failed'], 'Failed login attempt', $data);
		}
	}
}

return new Stackmash_WP_Login_Failed();