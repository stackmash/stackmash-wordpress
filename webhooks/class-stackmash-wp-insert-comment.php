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
 * Stackmash webhook for wp_insert_comment.
 *
 * @package    Stackmash
 * @subpackage Stackmash/webhooks
 * @author     Stackmash <support@stackmash.com>
 */
class Stackmash_WP_Insert_Comment
{
	public function __construct()
	{
		add_action('wp_insert_comment', [$this, 'wp_insert_comment'], 99, 2);
	}

	public function wp_insert_comment($comment_id, $comment_object)
	{
		// Get the options
		$options = get_option('stackmash');

		// Don't send any pointless notifications about WooCommerce
		if($comment_object->comment_agent == 'WooCommerce')
		{
			return;
		}

		$data = [
			'Comment' => $comment_object->comment_content,
			'Author' => [
				'Username' => $comment_object->comment_author,
				'Email' => $comment_object->comment_author_email,
				'IP' => $comment_object->comment_author_IP,
				'Agent' => $comment_object->comment_agent,
			]
		];

		// Create action
		if($options['wp_insert_comment'] != '')
		{
			stackmash_action($options['wp_insert_comment'], 'New comment', $data);
		}
	}
}

return new Stackmash_WP_Insert_Comment();