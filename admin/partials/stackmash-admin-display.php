<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://stackmash.com
 * @since      1.0.0
 *
 * @package    Stackmash
 * @subpackage Stackmash/admin/partials
 */
?>

<?php
$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'project_keys';
?>

<div class="wrap">
	<h1>Stackmash Settings</h1>

	<h2 class="nav-tab-wrapper">
		<a href="?page=stackmash&tab=project_keys" class="nav-tab <?php echo $active_tab == 'project_keys' ? 'nav-tab-active' : ''; ?>">Project keys</a>
		<a href="?page=stackmash&tab=default_categories" class="nav-tab <?php echo $active_tab == 'default_categories' ? 'nav-tab-active' : ''; ?>">WordPress categories</a>
		<a href="?page=stackmash&tab=plugin_categories" class="nav-tab <?php echo $active_tab == 'plugin_categories' ? 'nav-tab-active' : ''; ?>">Plugin categories</a>
		<a href="?page=stackmash&tab=custom_notifications" class="nav-tab <?php echo $active_tab == 'custom_notifications' ? 'nav-tab-active' : ''; ?>">Custom notifications</a>
	</h2>

	<?php if($active_tab == 'project_keys') { ?>
		<form method="POST" name="stackmash_options" action="options.php">
			<h2>Project keys</h2>

			<div id="col-container">
				<div id="col-right">
					<div class="col-wrap">
						<p><strong>How to get your project keys</strong></p>

						<p><a href="https://stackmash.com" class="button button-primary">Create a Stackmash account to receive notifications</a></p>

						<p>Your project keys are needed to connect to your Stackmash account. To find your project keys, login to <a href="https://app.stackmash.com" target="_blank">Stackmash</a> and select your project from the projects sidebar to the left.</p>

						<p>You will find your project keys located on the right, shown in the screenshot.</p>

						<img src="<?php echo plugin_dir_url(''); ?>stackmash/admin/images/project-keys.png" style="width: 100%; max-width: 500px;" />
					</div>
				</div>

				<div id="col-left">
					<div class="col-wrap">
						<fieldset>
							<p><strong>Public key</strong></p>
							<legend class="screen-reader-text"><span><?php _e('Public key', $this->plugin_name); ?></span></legend>
							<input type="text" class="large-text" id="<?php echo $this->plugin_name; ?>-public_key" name="<?php echo $this->plugin_name; ?>[public_key]" value="<?php if(!empty($options['public_key'])) echo $options['public_key']; ?>" />
						</fieldset>

						<fieldset>
							<p><strong>Private key</strong></p>
							<legend class="screen-reader-text"><span><?php _e('Private key', $this->plugin_name); ?></span></legend>
							<input type="password" class="large-text" id="<?php echo $this->plugin_name; ?>-private_key" name="<?php echo $this->plugin_name; ?>[private_key]" value="<?php if(!empty($options['private_key'])) echo $options['private_key']; ?>" />
						</fieldset>

						<input type="hidden" name="project_settings" value="1" />

						<p><?php submit_button('Save changes', 'primary', 'submit', TRUE); ?></p>
						<?php settings_fields($this->plugin_name); ?>
					</div>
				</div>
			</div>
		</form>
	<?php } ?>

	<?php if($active_tab == 'default_categories') { ?>
		<form method="POST" action="options.php">
			<h2>WordPress categories</h2>

			<p>Category ID's must be used. If you do not want a notification for a category, leave the field blank.</p>

			<fieldset>
				<p>User registered</p>
				<legend class="screen-reader-text"><span><?php _e('User registered', $this->plugin_name); ?></span></legend>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-user_register" name="<?php echo $this->plugin_name; ?>[user_register]" placeholder="user-registered" value="<?php if(!empty($options['user_register'])) echo $options['user_register']; ?>" />
			</fieldset>

			<fieldset>
				<p>Post published</p>
				<legend class="screen-reader-text"><span><?php _e('Post published', $this->plugin_name); ?></span></legend>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-publish_post" name="<?php echo $this->plugin_name; ?>[publish_post]" placeholder="post-published" value="<?php if(!empty($options['publish_post'])) echo $options['publish_post']; ?>" />
			</fieldset>

			<fieldset>
				<p>Page published</p>
				<legend class="screen-reader-text"><span><?php _e('Page published', $this->plugin_name); ?></span></legend>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-publish_page" name="<?php echo $this->plugin_name; ?>[publish_page]" placeholder="page-published" value="<?php if(!empty($options['publish_page'])) echo $options['publish_page']; ?>" />
			</fieldset>

			<fieldset>
				<p>New comment</p>
				<legend class="screen-reader-text"><span><?php _e('New comment', $this->plugin_name); ?></span></legend>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-wp_insert_comment" name="<?php echo $this->plugin_name; ?>[wp_insert_comment]" placeholder="new-comment" value="<?php if(!empty($options['wp_insert_comment'])) echo $options['wp_insert_comment']; ?>" />
			</fieldset>

			<fieldset>
				<p>Failed login attempt</p>
				<legend class="screen-reader-text"><span><?php _e('Failed login attempt', $this->plugin_name); ?></span></legend>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-wp_login_failed" name="<?php echo $this->plugin_name; ?>[wp_login_failed]" placeholder="failed-login-attempt" value="<?php if(!empty($options['wp_login_failed'])) echo $options['wp_login_failed']; ?>" />
			</fieldset>

			<input type="hidden" name="category_settings" value="1" />

			<?php submit_button('Save changes', 'primary', 'submit', TRUE); ?>
			<?php settings_fields($this->plugin_name); ?>
		</form>
	<?php } ?>

	<?php if($active_tab == 'plugin_categories') { ?>
		<form method="POST" action="options.php">
			<h2>Plugin categories</h2>

			<p>Category ID's must be used. If you do not want a notification for a category, leave the field blank.</p>
			<fieldset>
				<p>Contact Form 7 submissions</p>
				<legend class="screen-reader-text"><span><?php _e('Contact Form 7 submissions', $this->plugin_name); ?></span></legend>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-wpcf7_before_send_mail" name="<?php echo $this->plugin_name; ?>[wpcf7_before_send_mail]" placeholder="contact-submission" value="<?php if(!empty($options['wpcf7_before_send_mail'])) echo $options['wpcf7_before_send_mail']; ?>" />
			</fieldset>

			<fieldset>
				<p>Ninja Forms submissions</p>
				<legend class="screen-reader-text"><span><?php _e('Ninja Forms submissions', $this->plugin_name); ?></span></legend>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-ninja_forms_after_submission" name="<?php echo $this->plugin_name; ?>[ninja_forms_after_submission]" placeholder="contact-submission" value="<?php if(!empty($options['ninja_forms_after_submission'])) echo $options['ninja_forms_after_submission']; ?>" />
			</fieldset>

			<!--
			<fieldset>
				<p>Gravity Form submissions</p>
				<legend class="screen-reader-text"><span><?php _e('Gravity Form submissions', $this->plugin_name); ?></span></legend>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-publish_post" name="<?php echo $this->plugin_name; ?>[publish_post]" placeholder="contact-submission" value="<?php if(!empty($options['publish_post'])) echo $options['publish_post']; ?>" />
			</fieldset>

			<fieldset>
				<p>Jetpack Contact Form submissions</p>
				<legend class="screen-reader-text"><span><?php _e('Jetpack Contact Form submissions', $this->plugin_name); ?></span></legend>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-publish_page" name="<?php echo $this->plugin_name; ?>[publish_page]" placeholder="contact-submission" value="<?php if(!empty($options['publish_page'])) echo $options['publish_page']; ?>" />
			</fieldset>
			-->

			<fieldset>
				<p>WooCommerce order placed</p>
				<legend class="screen-reader-text"><span><?php _e('WooCommerce order placed', $this->plugin_name); ?></span></legend>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-woocommerce_checkout_update_order_meta" name="<?php echo $this->plugin_name; ?>[woocommerce_checkout_update_order_meta]" placeholder="order-placed" value="<?php if(!empty($options['woocommerce_checkout_update_order_meta'])) echo $options['woocommerce_checkout_update_order_meta']; ?>" />
			</fieldset>

			<!--
			<fieldset>
				<p>WooCommerce order cancelled</p>
				<legend class="screen-reader-text"><span><?php _e('WooCommerce cancelled', $this->plugin_name); ?></span></legend>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-woocommerce_checkout_update_order_meta" name="<?php echo $this->plugin_name; ?>[woocommerce_checkout_update_order_meta]" placeholder="order-cancelled" value="<?php if(!empty($options['woocommerce_checkout_update_order_meta'])) echo $options['woocommerce_checkout_update_order_meta']; ?>" />
			</fieldset>
			-->

			<input type="hidden" name="plugin_settings" value="1" />

			<?php submit_button('Save changes', 'primary', 'submit', TRUE); ?>
			<?php settings_fields($this->plugin_name); ?>
		</form>
	<?php } ?>

	<?php if($active_tab == 'custom_notifications') { ?>
		<form method="POST" name="stackmash_options" action="options.php">
			<h2>Custom notifications</h2>

			<p>Custom notifications can be added by using the <code>stackmash_action</code> function. The function can be used in the following way:</p>

			<p><code>&lt;?php stackmash_action($category_name, $notification_title, $body); ?&gt;</code></p>

			<p>Example:</p>

			<p><code>&lt;?php stackmash_action('general', 'You have a new notification', ['Your body data']); ?&gt;</code></p>

			<p>This function can then be called anywhere in your theme code including any custom webhooks.</p>
		</form>
	<?php } ?>
</div>