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
 * Stackmash webhook for publish_post.
 *
 * @package    Stackmash
 * @subpackage Stackmash/webhooks
 * @author     Stackmash <support@stackmash.com>
 */
class Stackmash_Publish_Post
{
	public function __construct()
	{
		add_action('publish_post', [$this, 'publish_post'], 10, 2);
	}

	public function publish_post($ID, $post)
	{
		// Get the options
		$options = get_option('stackmash');

		$data = [
			'Post Title' => $post->post_title,
			'Permalink' => get_permalink($ID),
			'Author' => [
				'Name' => get_the_author_meta('display_name', $post->post_author),
				'Email address' => get_the_author_meta('user_email', $post->post_author),
				'Username' => get_the_author_meta('user_login', $post->post_author),
			],
		];

		// Create action
		if($options['publish_post'] != '')
		{
			stackmash_action($options['publish_post'], 'Post published', $data);
		}
	}
}

return new Stackmash_Publish_Post();