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
 * Stackmash webhook for user_register.
 *
 * @package    Stackmash
 * @subpackage Stackmash/webhooks
 * @author     Stackmash <support@stackmash.com>
 */
class Stackmash_User_Register
{
	public function __construct()
	{
		add_action('user_register', [$this, 'user_register']);
	}

	public function user_register($user_id)
	{
		// Get the options
		$options = get_option('stackmash');

		$data = [
			'Username' => $_POST['user_login'],
			'First name' => $_POST['first_name'],
			'Last name' => $_POST['last_name'],
			'Email' => $_POST['email'],
			'URL' => $_POST['url'],
			'Role' => $_POST['role'],
		];

		// Create action
		if($options['user_register'] != '')
		{
			stackmash_action($options['user_register'], 'User registered', $data);
		}
	}
}

return new Stackmash_User_Register();