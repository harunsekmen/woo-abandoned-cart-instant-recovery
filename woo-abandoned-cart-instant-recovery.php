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
 * Text Domain:       woo-abandoned-cart-instant-recovery
 */

defined('ABSPATH') || exit;

// Declare WooCommerce High-Performance Order Storage (HPOS) compatibility
add_action('before_woocommerce_init', function () {
    if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class)) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
    }
});

// Display admin notice if WooCommerce is inactive
add_action('admin_notices', function () {
    if (!class_exists('WooCommerce')) {
        echo '<div class="notice notice-error is-dismissible"><p><strong>' .
             esc_html__('WooCommerce Instant Checkout Cart Recovery', 'woo-abandoned-cart-instant-recovery') .
             '</strong> ' .
             esc_html__('requires WooCommerce to be installed and active.', 'woo-abandoned-cart-instant-recovery') .
             '</p></div>';
    }
});

// Include includes
foreach (glob(__DIR__ . '/includes/*.php') as $inc_file) {
    require_once $inc_file;
}

// Initialize plugin after plugins are loaded and WooCommerce is verified
add_action('plugins_loaded', function () {
    if (!class_exists('WooCommerce')) {
        return;
    }
        if (class_exists('') && method_exists('', 'instance')) { call_user_func(['', 'instance']); }
        if (class_exists('WooAbandonedCartInstantRecovery_Admin') && method_exists('WooAbandonedCartInstantRecovery_Admin', 'instance')) { call_user_func(['WooAbandonedCartInstantRecovery_Admin', 'instance']); }
        if (class_exists('Woo_Abandoned_Cart_Recovery') && method_exists('Woo_Abandoned_Cart_Recovery', 'instance')) { call_user_func(['Woo_Abandoned_Cart_Recovery', 'instance']); }

}, 20);
