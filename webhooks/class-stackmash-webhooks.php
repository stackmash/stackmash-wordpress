<?php

class Stackmash_Webhooks
{
	public function __construct()
	{
		require_once(plugin_dir_path( __FILE__ ) . 'class-stackmash-user-register.php');
		require_once(plugin_dir_path( __FILE__ ) . 'class-stackmash-publish-post.php');
		require_once(plugin_dir_path( __FILE__ ) . 'class-stackmash-publish-page.php');
		require_once(plugin_dir_path( __FILE__ ) . 'class-stackmash-wp-insert-comment.php');
		require_once(plugin_dir_path( __FILE__ ) . 'class-stackmash-wp-login-failed.php');
		require_once(plugin_dir_path( __FILE__ ) . 'class-stackmash-cf7.php');
		//require_once(plugin_dir_path( __FILE__ ) . 'class-stackmash-gravity-forms.php'); Coming soon - not yet tested
		require_once(plugin_dir_path( __FILE__ ) . 'class-stackmash-ninja-forms.php');
		require_once(plugin_dir_path( __FILE__ ) . 'class-stackmash-woocommerce.php');
	}
}