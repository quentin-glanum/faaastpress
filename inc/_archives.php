<?php

// /**
//  * Remove bloat
//  *
//  * @since 1.0.0
//  */
// function remove_bloat()
// {
//     $options = get_option('faaastpress_bloat_options', array());

//     if (in_array('disable_emojis', $options, true)) {
//         remove_action('wp_head', 'print_emoji_detection_script', 7);
//         remove_action('admin_print_scripts', 'print_emoji_detection_script');
//         remove_action('wp_print_styles', 'print_emoji_styles');
//         remove_action('admin_print_styles', 'print_emoji_styles');
//         remove_filter('the_content_feed', 'wp_staticize_emoji');
//         remove_filter('comment_text_rss', 'wp_staticize_emoji');
//         remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
//         add_filter('tiny_mce_plugins', array($this, 'disable_emojis_tinymce'));
//     }

//     if (in_array('disable_embeds', $options, true)) {
//         remove_action('wp_head', 'wp_oembed_add_discovery_links');
//         remove_action('wp_head', 'wp_oembed_add_host_js');
//         add_filter('embed_oembed_discover', '__return_false');
//         add_filter('tiny_mce_plugins', array($this, 'disable_embeds_tiny_mce_plugin'));
//         add_filter('rewrite_rules_array', array($this, 'disable_embeds_rewrites'));
//         remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
//     }
// }


// /**
//  * Remove bloat - TinyMCE
//  *
//  * @since 1.0.0
//  *
//  * @param array $plugins List of TinyMCE plugins.
//  * @return array Modified list of TinyMCE plugins.
//  */
// function disable_emojis_tinymce($plugins)
// {
//     if (is_array($plugins)) {
//         return array_diff($plugins, array('wpemoji'));
//     }

//     return array();
// }


// /**
//  * Remove bloat - TinyMCE
//  *
//  * @since 1.0.0
//  *
//  * @param array $plugins List of TinyMCE plugins.
//  * @return array Modified list of TinyMCE plugins.
//  */
// function disable_embeds_tiny_mce_plugin($plugins)
// {
//     return array_diff($plugins, array('wpembed'));
// }


// /**
//  * Remove bloat - Rewrite rules
//  *
//  * @since 1.0.0
//  *
//  * @param array $rules WordPress rewrite rules.
//  * @return array Modified WordPress rewrite rules.
//  */
// function disable_embeds_rewrites($rules)
// {
//     foreach ($rules as $rule => $rewrite) {
//         if (false !== strpos($rewrite, 'embed=true')) {
//             unset($rules[$rule]);
//         }
//     }

//     return $rules;
// }


// /**
//  * Improve security
//  *
//  * @since 1.0.0
//  */
// function improve_security()
// {
//     $options = get_option('faaastpress_security_options', array());

//     if (in_array('disable_xml_rpc', $options, true)) {
//         add_filter('xmlrpc_enabled', '__return_false');
//     }

//     if (in_array('disable_file_editing', $options, true)) {
//         define('DISALLOW_FILE_EDIT', true);
//     }

//     if (in_array('disable_php_error_reporting', $options, true)) {
//         error_reporting(0);
//     }
// }


// /**
//  * Enhance performance
//  *
//  * @since 1.0.0
//  */
// function enhance_performance()
// {
//     $options = get_option('faaastpress_enhancement_options', array());
//     if (in_array('disable_revisions', $options, true)) {
//         define('WP_POST_REVISIONS', false);
//     }

//     if (in_array('disable_autosave', $options, true)) {
//         wp_deregister_script('autosave');
//     }

//     if (in_array('optimize_images', $options, true)) {
//         add_filter('jpeg_quality', array($this, 'optimize_jpeg_quality'));
//         add_filter('wp_editor_set_quality', array($this, 'optimize_jpeg_quality'));
//     }
// }


// /**
//  * Enhance performance - JPEG quality
//  *
//  * @since 1.0.0
//  *
//  * @param int $quality JPEG image quality.
//  * @return int Modified JPEG image quality.
//  */
// function optimize_jpeg_quality($quality)
// {
//     return 90;
// }


// /**
//  * Enhance performance - WooCommerce
//  *
//  * @since 1.0.0
//  */
// function enhance_woocommerce_performance()
// {
//     $options = get_option('faaastpress_woocommerce_options', array());

//     if (in_array('disable_product_reviews', $options, true)) {
//         remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating', 5);
//         remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
//         add_filter('woocommerce_product_tabs', array($this, 'disable_product_reviews_tab'), 98);
//         add_filter('woocommerce_product_tabs', array($this, 'remove_reviews_from_tab_titles'));
//         add_filter('woocommerce_product_review_count', '__return_false');
//     }

//     if (in_array('disable_related_products', $options, true)) {
//         remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
//     }

//     if (in_array('disable_cross_sells', $options, true)) {
//         remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
//     }

//     if (in_array('disable_cart_fragmentation', $options, true)) {
//         add_action('wp_enqueue_scripts', array($this, 'disable_cart_fragmentation'));
//     }

//     if (in_array('disable_checkout_field_phone', $options, true)) {
//         add_filter('woocommerce_checkout_fields', array($this, 'disable_checkout_field_phone'));
//     }
// }


// /**
//  * Enhance performance - WooCommerce - cart fragmentation
//  *
//  * @since 1.0.0
//  */
// function disable_cart_fragmentation()
// {
//     wp_dequeue_script('wc-cart-fragments');
// }


// /**
//  * Enhance performance - WooCommerce - disable product reviews tab
//  *
//  * @since 1.0.0
//  *
//  * @param array $tabs List of product tabs.
//  * @return array Modified list of product tabs.
//  */
// function disable_product_reviews_tab($tabs)
// {
//     unset($tabs['reviews']);

//     return $tabs;
// }


// /**
//  * Enhance performance - WooCommerce - remove reviews from tab titles
//  *
//  * @since 1.0.0
//  *
//  * @param array $tabs List of product tabs.
//  * @return array Modified list of product tabs.
//  */
// function remove_reviews_from_tab_titles($tabs)
// {
//     foreach ($tabs as $key => $tab) {
//         if (isset($tab['title'])) {
//             $tab['title'] = str_replace('Reviews', '', $tab['title']);
//             $tabs[$key]  = $tab;
//         }
//     }

//     return $tabs;
// }


// /**
//  * Enhance performance - WooCommerce - disable phone field at checkout
//  *
//  * @since 1.0.0
//  *
//  * @param array $fields List of checkout fields.
//  * @return array Modified list of checkout fields.
//  */
// function disable_checkout_field_phone($fields)
// {
//     unset($fields['billing']['billing_phone']);

//     return $fields;
// }
