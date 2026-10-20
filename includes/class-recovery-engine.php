<?php
defined('ABSPATH') || exit;

/**
 * Instant Checkout Abandonment Recovery Engine
 * Captures email on focus-out and generates single-click session recovery links.
 *
 * @package WooAbandonedCartInstantRecovery
 * @author  Harun Sekmen <sekmenwp@gmail.com>
 */
final class Woo_Abandoned_Cart_Recovery {
    const VERSION = '1.0.0';
    private static ?self $instance = null;

    public static function instance(): self {
        return self::$instance ??= new self();
    }

    private function __construct() {
        add_action('wp_ajax_wacir_capture_lead', [$this, 'ajax_capture_lead']);
        add_action('wp_ajax_nopriv_wacir_capture_lead', [$this, 'ajax_capture_lead']);
        add_action('template_redirect', [$this, 'handle_cart_recovery_link']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function ajax_capture_lead(): void {
        check_ajax_referer('wacir_lead_nonce', 'nonce');
        $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));

        if (!is_email($email)) {
            wp_send_json_error(['message' => 'Invalid email address']);
        }

        $token = wp_generate_password(32, false);
        set_transient('wacir_lead_' . $token, [
            'email'     => $email,
            'timestamp' => time()
        ], 86400 * 3); // 3 days validity

        wp_send_json_success([
            'token' => $token,
            'recovery_url' => add_query_arg('recover_cart', $token, home_url('/checkout/'))
        ]);
    }

    public function handle_cart_recovery_link(): void {
        if (!isset($_GET['recover_cart'])) return;
        $token = sanitize_text_field(wp_unslash($_GET['recover_cart']));
        $data = get_transient('wacir_lead_' . $token);

        if ($data && !empty($data['email'])) {
            // Restore email to session
            if (function_exists('WC') && WC()->customer) {
                WC()->customer->set_billing_email($data['email']);
            }
        }
    }

    public function enqueue_assets(): void {
        if (!function_exists('is_checkout') || !is_checkout()) return;

        wp_enqueue_script('wacir-capture-js', plugins_url('assets/js/capture.js', dirname(__FILE__)), ['jquery'], self::VERSION, true);
        wp_localize_script('wacir-capture-js', 'WACIR_Data', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('wacir_lead_nonce')
        ]);
    }
}
