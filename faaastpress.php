<?php

/**
 * Plugin Name: FaaastPress
 * Plugin URI: https://github.com/QuentinLD
 * Description: Speed up and secure your WordPress site with just a few clicks.
 * Version: 1.0.0
 * Author: Quentin LD
 * Author URI: https://github.com/QuentinLD
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: faaastpress
 * Domain Path: /languages
 *
 * FaaastPress is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * FaaastPress is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with FaaastPress. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 *
 * @package FaaastPress
 */

defined('ABSPATH') || exit;

if (!class_exists('FaaastPress_plugin')) {

    /**
     * Main FaaastPress_plugin class
     */
    class FaaastPress_plugin
    {
        /**
         * Class constructor
         */
        public function __construct()
        {
            // Load plugin text domain
            add_action('init', array($this, 'faaastpress_load_textdomain'));

            // Load plugin styles & scripts
            add_action('admin_print_styles', array($this, 'faaastpress_enqueue_styles'));
            add_action('admin_enqueue_scripts', array($this, 'faaastpress_enqueue_scripts'));

            // Add plugin settings page
            add_action('admin_menu', array($this, 'faaastpress_add_settings_page'));

            // Save plugin settings
            add_action('admin_post', array($this, 'faaastpress_save_options'));

            // Handle plugin settings updated message
            add_action('admin_notices', array($this, 'faaastpress_settings_updated_notice'));

            // Enable plugin settings
            add_action('init', array($this, 'faaastpress_enable_options'));

            include_once('inc/bloat.php');
            include_once('inc/enhancement.php');
            include_once('inc/security.php');
            include_once('inc/woocommerce.php');
        }


        /**
         * Load plugin text domain
         *
         * @since 1.0.0
         */
        public function faaastpress_load_textdomain()
        {
            load_plugin_textdomain('faaastpress', false, dirname(plugin_basename(__FILE__)) . '/languages');
        }


        /**
         * Load styles & scripts
         *
         * @since 1.0.0
         */
        public function faaastpress_enqueue_styles()
        {
            wp_enqueue_style('faaastpress-styles', plugin_dir_url(__FILE__) . 'assets/faaastpress.css');
        }

        public function faaastpress_enqueue_scripts()
        {
            wp_enqueue_script('faaastpress-scripts', plugin_dir_url(__FILE__) . 'assets/faaastpress.js');
        }

        /**
         * Add plugin settings page
         *
         * @since 1.0.0
         */
        public function faaastpress_add_settings_page()
        {
            add_options_page(
                __('FaaastPress Settings', 'faaastpress'),
                __('FaaastPress', 'faaastpress'),
                'manage_options',
                'faaastpress',
                array($this, 'render_settings_page')
            );
        }


        /**
         * Render plugin settings page
         *
         * @since 1.0.0
         */
        public function render_settings_page()
        {
            include_once('views/settings.php');
        }

        /**
         * Save plugin settings
         *
         * @since 1.0.0
         */
        public function faaastpress_save_options()
        {
            if (!current_user_can('manage_options')) {
                return;
            }

            if (!isset($_POST['faaastpress_options_nonce']) || !wp_verify_nonce(sanitize_key($_POST['faaastpress_options_nonce']), 'faaastpress_options')) {
                return;
            }

            // Save bloat options
            $bloat_options = isset($_POST['bloat_options']) && is_array($_POST['bloat_options']) ? array_map('sanitize_key', wp_unslash($_POST['bloat_options'])) : array();
            update_option('faaastpress_bloat_options', $bloat_options);

            // Save security options
            $security_options = isset($_POST['security_options']) && is_array($_POST['security_options']) ? array_map('sanitize_key', wp_unslash($_POST['security_options'])) : array();
            update_option('faaastpress_security_options', $security_options);

            // Save enhancement options
            $enhancement_options = isset($_POST['enhancement_options']) && is_array($_POST['enhancement_options']) ? array_map('sanitize_key', wp_unslash($_POST['enhancement_options'])) : array();
            update_option('faaastpress_enhancement_options', $enhancement_options);

            // Save WooCommerce options
            $woocommerce_options = isset($_POST['woocommerce_options']) && is_array($_POST['woocommerce_options']) ? array_map('sanitize_key', wp_unslash($_POST['woocommerce_options'])) : array();
            update_option('faaastpress_woocommerce_options', $woocommerce_options);

            // Redirect to settings page
            wp_safe_redirect(add_query_arg(array('page' => 'faaastpress', 'settings-updated' => true), admin_url('options-general.php')));
            exit;
        }


        /**
         * Handle plugin settings updated message
         *
         * @since 1.0.0
         */
        public function faaastpress_settings_updated_notice()
        {
            if (!isset($_GET['settings-updated']) || !filter_var(wp_unslash($_GET['settings-updated']), FILTER_VALIDATE_BOOLEAN)) {
                return;
            }
            echo '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html('Settings saved.', 'faaastpress') . '</strong></p></div>';
        }


        /**
         * Enable plugin options
         *
         * @since 1.0.0
         */
        public function faaastpress_enable_options()
        {
            // Get bloat options
            $bloat_options = get_option('faaastpress_bloat_options', array());
            faaastpress_remove_bloat($bloat_options);
            
            // Get security options
            $security_options = get_option('faaastpress_security_options', array());
            // Get enhancement options
            $enhancement_options = get_option('faaastpress_enhancement_options', array());
            // Get woocommerce options
            $woocommerce_options = get_option('faaastpress_woocommerce_options', array());
        }
    }


    if (!function_exists('faaastpress')) {

        /**
         * Returns the main instance of FaaastPress.
         *
         * @since 1.0.0
         * @return FaaastPress_plugin
         */
        function faaastpress()
        {
            return new FaaastPress_plugin();
        }
    }

    faaastpress();
}
