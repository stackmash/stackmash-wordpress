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
 * Stackmash webhook for woocommerce_checkout_update_order_meta
 *
 * @package    Stackmash
 * @subpackage Stackmash/webhooks
 * @author     Stackmash <support@stackmash.com>
 */
class Stackmash_Woocommerce
{
	public function __construct()
	{
		add_action('woocommerce_checkout_update_order_meta', [$this, 'woocommerce_checkout_update_order_meta'], 15);
	}

	public function woocommerce_checkout_update_order_meta($order_id)
	{
		// Get the options
		$options = get_option('stackmash');

		// Get order
		$order = wc_get_order($order_id);

		$order_number = strip_tags($order->get_order_number());
		$total = html_entity_decode(strip_tags($order->get_formatted_order_total()));

		$data = ['Order number' => $order_number, 'Customer' => $this->get_customer($order), 'Items' => $this->get_items($order), 'Total amount' => $total];

		// Create action
		if($options['woocommerce_checkout_update_order_meta'] != '')
		{
			stackmash_action($options['woocommerce_checkout_update_order_meta'], 'Order placed', $data);
		}
	}

	private function get_customer($order)
	{
		$customer = [];

		$customer['Name'] = esc_html($order->get_formatted_billing_full_name());
		$customer['Email address'] = esc_html($order->get_billing_email());
		$customer['Address line 1'] = esc_html($order->get_shipping_address_1());
		$customer['Address line 2'] = esc_html($order->get_shipping_address_2());
		$customer['City'] = esc_html($order->get_shipping_city());
		$customer['State'] = esc_html($order->get_shipping_state());
		$customer['ZIP'] = esc_html($order->get_shipping_postcode());
		$customer['Country'] = esc_html($order->get_shipping_country());

		return $customer;
	}

	private function get_items($order)
	{
		$items = [];

		foreach($order->get_items() as $item)
		{
			$items[] = ['Product' => $item->get_name(), 'Product ID' => $item->get_product_id()];
		}

		return $items;
	}
}

return new Stackmash_Woocommerce();