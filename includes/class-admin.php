<?php
defined('ABSPATH') || exit;

/**
 * WordPress Admin Settings & Telemetry Dashboard
 *
 * @package WooAbandonedCartInstantRecovery
 * @author  Harun Sekmen <sekmenwp@gmail.com>
 */
final class WooAbandonedCartInstantRecovery_Admin {
    const OPTION_KEY = 'wacir_settings';
    private static ?self $instance = null;

    public static function instance(): self {
        return self::$instance ??= new self();
    }

    private function __construct() {
        add_action('admin_menu', [$this, 'register_menu_page']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    public function register_menu_page(): void {
        add_submenu_page(
            'woocommerce',
            esc_html__('Instant Checkout Cart Recovery Dashboard', 'woo-abandoned-cart-instant-recovery'),
            esc_html__('Cart Recovery', 'woo-abandoned-cart-instant-recovery'),
            'manage_woocommerce',
            'woo-abandoned-cart-instant-recovery-dashboard',
            [$this, 'render_dashboard_view']
        );
    }

    public function register_settings(): void {
        register_setting('wacir_settings_group', self::OPTION_KEY, [
            'type'              => 'array',
            'sanitize_callback' => [$this, 'sanitize_settings'],
            'default'           => ['capture_on_blur' => 1, 'retention_days' => 3, 'auto_discount' => 0]
        ]);
    }

    public function sanitize_settings($input): array {
        $output = [];
        if (is_array($input)) {
            foreach ($input as $key => $val) {
                $output[sanitize_key($key)] = is_numeric($val) ? (float)$val : sanitize_text_field($val);
            }
        }
        return $output;
    }

    public function render_dashboard_view(): void {
        if (!current_user_can('manage_woocommerce')) {
            return;
        }
        $settings = get_option(self::OPTION_KEY, ['capture_on_blur' => 1, 'retention_days' => 3, 'auto_discount' => 0]);
        require_once dirname(__DIR__) . '/templates/admin-dashboard.php';
    }
}

add_action('plugins_loaded', ['WooAbandonedCartInstantRecovery_Admin', 'instance']);
