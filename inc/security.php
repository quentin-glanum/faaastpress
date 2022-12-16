<?php
// /*
//  * ================================
//  *  Disable XML RPC
//  */
// add_filter('xmlrpc_enabled', '__return_false');
// remove_action('wp_head', 'rsd_link');

// /*
//  * ================================
//  *  Hide WP version
//  */
// function h5_remove_version()
// {
//     return '';
// }
// add_filter('the_generator', 'h5_remove_version');

// /*
//  * ================================
//  *  Remove wlwmanifest Link
//  */
// remove_action('wp_head', 'wlwmanifest_link');

// /*
//  * ================================
//  *  Remove RSD Link
//  */
// remove_action('wp_head', 'rsd_link');

// /*
//  * ================================
//  *  Remove Shortlink
//  */
// remove_action('template_redirect', 'wp_shortlink_header', 11);

// /*
//  * ================================
//  *  Disable RSS Feeds
//  */
// function h5_disable_feed() {
//     wp_die(__('No feed available, please visit the <a href="' . esc_url(home_url('/')) . '">homepage</a>!'));
// }
// add_action('do_feed', 'h5_disable_feed', 1);
// add_action('do_feed_rdf', 'h5_disable_feed', 1);
// add_action('do_feed_rss', 'h5_disable_feed', 1);
// add_action('do_feed_rss2', 'h5_disable_feed', 1);
// add_action('do_feed_atom', 'h5_disable_feed', 1);
// add_action('do_feed_rss2_comments', 'h5_disable_feed', 1);
// add_action('do_feed_atom_comments', 'h5_disable_feed', 1);

// /*
//  * ================================
//  *  Remove RSS Feed links
//  */
// remove_action('wp_head', 'feed_links_extra', 3);
// remove_action('wp_head', 'feed_links', 2);

// /*
//  * ================================
//  *  Disable Self Pingbacks
//  */
// function h5_no_self_ping(&$links) {
//     $home = get_option('home');
//     foreach ($links as $l => $link) {
//         if (0 === strpos($link, $home)) {
//             unset($links[$l]);
//         }
//     }
// }
// add_action('pre_ping', 'h5_no_self_ping');

// /*
//  * ================================
//  *  Disable REST API for non-logged-in users
//  */
// function h5_secure_api($result) {
//     if (!empty($result)) {
//         return $result;
//     }
//     if (!is_user_logged_in()) {
//         return new WP_Error('rest_not_logged_in', 'You are not currently logged in.', ['status' => 401]);
//     }

//     return $result;
// }
// add_filter('rest_authentication_errors', 'h5_secure_api');

// /*
//  * ================================
//  *  Remove REST API links
//  */
// remove_action('wp_head', 'rest_output_link_wp_head');
// remove_action('wp_head', 'wp_oembed_add_discovery_links');
