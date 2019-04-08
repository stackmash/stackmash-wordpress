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
 * Stackmash webhook for ninja_forms_after_submission.
 *
 * @package    Stackmash
 * @subpackage Stackmash/webhooks
 * @author     Stackmash <support@stackmash.com>
 */
class Stackmash_Ninja_Forms
{
	public function __construct()
	{
		add_action('ninja_forms_after_submission', [$this, 'ninja_forms_after_submission']);
	}

	public function ninja_forms_after_submission($form_data)
	{
		// Get the options
		$options = get_option('stackmash');

		$data = [];

		foreach($form_data['fields'] as $field)
		{
			if($field['type'] == 'submit')
				continue;

			$data[$field['label']] = $field['value'];
		}

		// Create action
		if($options['ninja_forms_after_submission'] != '')
		{
			stackmash_action($options['ninja_forms_after_submission'], 'Contact form submission', $data);
		}
	}
}

return new Stackmash_Ninja_Forms();