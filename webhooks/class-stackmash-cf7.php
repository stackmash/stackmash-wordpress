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
 * Stackmash webhook for wpcf7_before_send_mail.
 *
 * @package    Stackmash
 * @subpackage Stackmash/webhooks
 * @author     Stackmash <support@stackmash.com>
 */
class Stackmash_CF7
{
	public function __construct()
	{
		add_action('wpcf7_before_send_mail', [$this, 'wpcf7_before_send_mail'], 10, 3);
	}

	public function wpcf7_before_send_mail($contact_form, $abort, $submission)
	{
		// Get the options
		$options = get_option('stackmash');

		$postData = $submission->get_posted_data();
		$data = [];

		if(!empty($postData))
		{
			foreach($postData as $key => $value)
			{
				if('_' === substr($key, 0, 1) || empty($value))
				{
					continue;
				}

				$data[$key] = $value;
			}
		}

		// Create action
		if($options['wpcf7_before_send_mail'] != '')
		{
			stackmash_action($options['wpcf7_before_send_mail'], 'Contact form submission', $data);
		}
	}
}

return new Stackmash_CF7();