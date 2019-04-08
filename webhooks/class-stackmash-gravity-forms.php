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
 * Stackmash webhook for gform_entry_created. -- COMING SOON --
 *
 * @package    Stackmash
 * @subpackage Stackmash/webhooks
 * @author     Stackmash <support@stackmash.com>
 */
class Stackmash_Gravity_Forms
{
	public function __construct()
	{
		add_action('gform_entry_created', [$this, 'gform_entry_created'], 10, 2);
	}

	public function gform_entry_created($entry, $form)
	{
		// Get the options
		$options = get_option('stackmash');

		$data = $form['fields'];

		// Create action
		if($options['gform_entry_created'] != '')
		{
			stackmash_action($options['gform_entry_created'], 'Contact form submission', $data);
		}
	}
}

return new Stackmash_Gravity_Forms();