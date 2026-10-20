<?php
/**
 * Plugin Name:       WooCommerce Instant Checkout Cart Recovery
 * Plugin URI:        https://github.com/harunsekmen/woo-abandoned-cart-instant-recovery
 * Description:       Asynchronous email capture on input focus-out, generating one-click direct recovery URLs with restored cart sessions.
 * Version:           1.0.0
 * Author:            Harun Sekmen
 * Author URI:        https://github.com/harunsekmen
 * License:           GPL-3.0
 * Requires at least: 6.2
 * Requires PHP:      8.1
 * WC requires at least: 8.0
 */

defined('ABSPATH') || exit;

add_action('before_woocommerce_init', function () {
    if (class_exists(AutomatticWooCommerceUtilitiesFeaturesUtil::class)) {
        AutomatticWooCommerceUtilitiesFeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
    }
});

require_once __DIR__ . '/includes/class-recovery-engine.php';

add_action('plugins_loaded', ['Woo_Abandoned_Cart_Recovery', 'instance']);
