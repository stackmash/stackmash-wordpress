=== Stackmash Notifications ===
Contributors: stackmash
Donate link: https://stackmash.com
Tags: notifications, alerts, notification, alert, desktop notification
Requires at least: 4.7.0
Requires PHP: 5.4.0
Tested up to: 5.1.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Real-time notifications for all of your websites activity.

== Description ==

Stackmash keeps your team in the loop with real-time notifications for events happening within your website, allowing you to increase conversions, clear your inbox & improve user experience. In order to use this plugin, you will need a Stackmash account. You can create a free Stackmash account by [clicking here](https://stackmash.com/ "Stackmash").

By default, this plugin gives you notifications for the following events:

*   User registered
*   Post published
*   Page published
*   New comment
*   Failed login attempt
*   Contact Form 7 & Ninja Forms submissions
*   Orders placed with WooCommerce

    Extra notifications can be added to custom actions within WordPress. This can be done by using the stackmash_action function: An example of this function would be:
    `<?php stackmash_action($category_name, $notification_title, $body); ?>`

== Installation ==

To install the Stackmash plugin, do the following.

1. Search for "Stackmash WordPress Notifications" by going to Plugins > Add New.
2. Click "Install Now" and then click "Activate".
3. Create a free Stackmash account if you haven't by [clicking here](https://stackmash.com/ "Stackmash").
4. Go to Stackmash in your dashboard by clicking the link in the sidebar.
5. Copy your project keys from the right sidebar in your Stackmash dashboard and paste them into the input boxes in your WordPress dashboard.

== Frequently Asked Questions ==

= Why do I need a Stackmash account =

Stackmash is needed to handle the real-time notifications and send them to your account.

= Can I use this plugin to get any notification from my website =

Yes. Although this plugin has default notification actions built in, you can easily add more providing you know a little PHP.

== Screenshots ==

1. Default WordPress categories.
2. Plugin categories.
3. Add notifications to custom actions.

== Changelog ==

= 1.0.0 =
* Initial version.

== Upgrade Notice ==

= 1.0.0 =
There are no upgrades as of version 1.