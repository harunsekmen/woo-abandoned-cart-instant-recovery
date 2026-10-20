<?php
defined('ABSPATH') || exit;

final class Woo_Abandoned_Cart_Recovery {
    const VERSION = '1.0.0';
    private static ?self $instance = null;

    public static function instance(): self {
        return self::$instance ??= new self();
    }

    private function __construct() {
        add_action('wp_ajax_wacir_capture_email', [$this, 'ajax_capture_email']);
        add_action('wp_ajax_nopriv_wacir_capture_email', [$this, 'ajax_capture_email']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    public function ajax_capture_email(): void {
        check_ajax_referer('wacir_nonce', 'nonce');
        $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));

        if (!is_email($email)) {
            wp_send_json_error(['message' => 'Invalid email']);
        }

        $token = wp_generate_password(24, false);
        set_transient('wacir_cart_' . $token, [
            'email' => $email,
            'time'  => time()
        ], 86400);

        wp_send_json_success([
            'captured' => true,
            'token'    => $token
        ]);
    }

    public function enqueue_scripts(): void {
        if (!function_exists('is_checkout') || !is_checkout()) {
            return;
        }

        wp_enqueue_script(
            'wacir-capture',
            plugins_url('assets/js/capture.js', dirname(__FILE__)),
            ['jquery'],
            self::VERSION,
            true
        );

        wp_localize_script('wacir-capture', 'WACIR_Data', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('wacir_nonce')
        ]);
    }
}
