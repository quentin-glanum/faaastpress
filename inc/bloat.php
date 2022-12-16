<?php

/**
 * Remove bloat
 *
 * @since 1.0.0
 */
function faaastpress_remove_bloat($bloat_options)
{
    var_dump($bloat_options);

    if (in_array('disable_jquery_migrate', $bloat_options, true)) {
        add_action('wp_default_scripts', 'faaastpress_remove_jquery_migrate');
    }
    if (in_array('disable_emojis', $bloat_options, true)) {
        add_action('init', 'faaastpress_disable_emojis');
    }
    if (in_array('disable_dashicons', $bloat_options, true)) {
        add_action('wp_print_styles', 'faaastpress_adminify_remove_dashicons', 100);
    }
}


/*
 * ================================
 *  Disable jQuery migrate
 */
function faaastpress_remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, ['jquery-migrate']);
        }
    }
}


/*
 * ================================
 *  Disable emoji's
 */
function faaastpress_disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'faaastpress_disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'faaastpress_disable_emojis_remove_dns_prefetch', 10, 2);
}


//Filter function used to remove the tinymce emoji plugin.
function faaastpress_disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, ['wpemoji']);
    } else {
        return [];
    }
}

//Remove emoji CDN hostname from DNS prefetching hints.
function faaastpress_disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
        $urls = array_diff($urls, [$emoji_svg_url]);
    }

    return $urls;
}

/*
 * ================================
 *  Disable Dashicons CSS for non-logged-in users
 */
//Remove Dashicons from Admin Bar for non logged in users
function faaastpress_adminify_remove_dashicons()
{
    if (!is_admin_bar_showing() && !is_customize_preview()) {
        wp_dequeue_style('dashicons');
        wp_deregister_style('dashicons');
    }
}

/*
 * ================================
 *  Remove author page URL
 */
function faaastpress_no_author_link()
{
    printf(
        ' <span class="byline">%1$s</span>',
        sprintf(
            '<span class="author vcard" itemtype="http://schema.org/Person" itemscope="itemscope" itemprop="author">%1$s <span class="fn n author-name" itemprop="name">%4$s</span></span>',
            __('by', 'generatepress'),
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_attr(sprintf(__('View all posts by %s', 'generatepress'), get_the_author())),
            esc_html(get_the_author())
        )
    );
}
add_filter('generate_post_author_output', 'faaastpress_no_author_link');

function faaastpress_author_page_redirect($link)
{
    $link = '';

    return $link;
}
add_action('author_link', 'faaastpress_author_page_redirect');

/*
 * ================================
 *  Remove comment author URL
 */
function faaastpress_remove_comment_author_link($return, $author, $comment_ID)
{
    return $author;
}
add_filter('get_comment_author_link', 'faaastpress_remove_comment_author_link', 10, 3);

/*
 * ================================
 *  Remove comment website URL
 */
add_action('after_setup_theme', 'faaastpress_add_comment_url_filter');
function faaastpress_add_comment_url_filter()
{
    add_filter('comment_form_default_fields', 'faaastpress_disable_comment_url', 20);
}

function faaastpress_disable_comment_url($fields)
{
    unset($fields['url']);

    return $fields;
}

/*
 * ================================
 *  Remove YOAST SEO HTML comments
 */
add_filter('wpseo_debug_markers', '__return_false');

/*
 * ================================
 * Disable color scheme from user dashboard
 */
remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');
