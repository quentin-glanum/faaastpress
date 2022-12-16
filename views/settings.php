<div class="wrap">
    <h1><?php esc_html_e('FaaastPress Settings', 'faaastpress'); ?></h1>
    <h2>🚀&nbsp;<?php esc_html_e('Speed up and secure your WordPress site with just a few clicks.', 'faaastpress') ?></h2>

    <form method="post" action="<?php echo esc_html(admin_url('admin-post.php')); ?>">
        <div class="nav-tab-wrapper">
            <a href="#bloat" class="nav-tab nav-tab-active"><?php esc_html_e('Bloat', 'faaastpress'); ?></a>
            <a href="#security" class="nav-tab"><?php esc_html_e('Security', 'faaastpress'); ?></a>
            <a href="#enhancement" class="nav-tab"><?php esc_html_e('Enhancement', 'faaastpress'); ?></a>
            <a href="#woocommerce" class="nav-tab"><?php esc_html_e('WooCommerce', 'faaastpress'); ?></a>
        </div>

        <div id="bloat" class="tab-content">
            <h3><?php esc_html_e('Bloat Options', 'faaastpress'); ?></h3>
            <p>
                <label>
                    <input type="checkbox" name="bloat_options[]" value="disable_jquery_migrate" <?php checked(in_array('disable_jquery_migrate', get_option('faaastpress_bloat_options', array()), true)); ?>>
                    <?php esc_html_e('Disable JQuery Migrate', 'faaastpress'); ?>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" name="bloat_options[]" value="disable_emojis" <?php checked(in_array('disable_emojis', get_option('faaastpress_bloat_options', array()), true)); ?>>
                    <?php esc_html_e('Disable emojis', 'faaastpress'); ?>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" name="bloat_options[]" value="disable_dashicons" <?php checked(in_array('disable_dashicons', get_option('faaastpress_bloat_options', array()), true)); ?>>
                    <?php esc_html_e('Disable dashicons', 'faaastpress'); ?>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" name="bloat_options[]" value="remove_comment_url" <?php checked(in_array('remove_comment_url', get_option('faaastpress_bloat_options', array()), true)); ?>>
                    <?php esc_html_e('Remove author comment link and website field', 'faaastpress'); ?>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" name="bloat_options[]" value="remove_yoast_comments" <?php checked(in_array('remove_yoast_comments', get_option('faaastpress_bloat_options', array()), true)); ?>>
                    <?php esc_html_e('Remove Yoast SEO HTML comments', 'faaastpress'); ?>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" name="bloat_options[]" value="disable_color_scheme" <?php checked(in_array('disable_color_scheme', get_option('faaastpress_bloat_options', array()), true)); ?>>
                    <?php esc_html_e('Disable color scheme from user dashboard', 'faaastpress'); ?>
                </label>
            </p>
        </div>

        <div id="security" class="tab-content hidden">
            <h3><?php esc_html_e('Security Options', 'faaastpress'); ?></h3>

            <p>
                <label>
                    <input type="checkbox" name="security_options[]" value="disable_xml_rpc" <?php checked(in_array('disable_xml_rpc', get_option('faaastpress_security_options', array()), true)); ?>>
                    <?php esc_html_e('Disable XML-RPC', 'faaastpress'); ?>
                </label>
            </p>

            <p>
                <label>
                    <input type="checkbox" name="security_options[]" value="disable_trackbacks" <?php checked(in_array('disable_trackbacks', get_option('faaastpress_security_options', array()), true)); ?>>
                    <?php esc_html_e('Disable trackbacks', 'faaastpress'); ?>
                </label>
            </p>

            <p>
                <label>
                    <input type="checkbox" name="security_options[]" value="disable_file_editing" <?php checked(in_array('disable_file_editing', get_option('faaastpress_security_options', array()), true)); ?>>
                    <?php esc_html_e('Disable file editing', 'faaastpress'); ?>
                </label>
            </p>

            <p>
                <label>
                    <input type="checkbox" name="security_options[]" value="disable_php_error_reporting" <?php checked(in_array('disable_php_error_reporting', get_option('faaastpress_security_options', array()), true)); ?>>
                    <?php esc_html_e('Disable PHP error reporting', 'faaastpress'); ?>
                </label>
            </p>
        </div>

        <div id="enhancement" class="tab-content hidden">
            <h3><?php esc_html_e('Enhancement Options', 'faaastpress'); ?></h3>

            <p>
                <label>
                    <input disabled type="checkbox" name="enhancement_options[]" value="lazy_load_images" <?php checked(in_array('lazy_load_images', get_option('faaastpress_enhancement_options', array()), true)); ?>>
                    <?php esc_html_e('Lazy load images', 'faaastpress'); ?>
                </label>
            </p>

            <p>
                <label>
                    <input disabled type="checkbox" name="enhancement_options[]" value="defer_parsing_of_javascript" <?php checked(in_array('defer_parsing_of_javascript', get_option('faaastpress_enhancement_options', array()), true)); ?>>
                    <?php esc_html_e('Defer parsing of JavaScript', 'faaastpress'); ?>
                </label>
            </p>

            <p>
                <label>
                    <input disabled type="checkbox" name="enhancement_options[]" value="minify_html" <?php checked(in_array('minify_html', get_option('faaastpress_enhancement_options', array()), true)); ?>>
                    <?php esc_html_e('Minify HTML', 'faaastpress'); ?>
                </label>
            </p>

            <p>
                <label>
                    <input disabled type="checkbox" name="enhancement_options[]" value="optimize_images" <?php checked(in_array('optimize_images', get_option('faaastpress_enhancement_options', array()), true)); ?>>
                    <?php esc_html_e('Optimize images', 'faaastpress'); ?>
                </label>
            </p>
        </div>

        <div id="woocommerce" class="tab-content hidden">
            <h3><?php esc_html_e('WooCommerce Options', 'faaastpress'); ?></h3>

            <p>
                <label>
                    <input disabled type="checkbox" name="woocommerce_options[]" value="disable_product_reviews" <?php checked(in_array('disable_product_reviews', get_option('faaastpress_woocommerce_options', array()), true)); ?>>
                    <?php esc_html_e('Disable product reviews', 'faaastpress'); ?>
                </label>
            </p>

            <p>
                <label>
                    <input disabled type="checkbox" name="woocommerce_options[]" value="disable_related_products" <?php checked(in_array('disable_related_products', get_option('faaastpress_woocommerce_options', array()), true)); ?>>
                    <?php esc_html_e('Disable related products', 'faaastpress'); ?>
                </label>
            </p>

            <p>
                <label>
                    <input disabled type="checkbox" name="woocommerce_options[]" value="disable_cross_sells" <?php checked(in_array('disable_cross_sells', get_option('faaastpress_woocommerce_options', array()), true)); ?>>
                    <?php esc_html_e('Disable cross-sells', 'faaastpress'); ?>
                </label>
            </p>

            <p>
                <label>
                    <input disabled type="checkbox" name="woocommerce_options[]" value="disable_cart_fragmentation" <?php checked(in_array('disable_cart_fragmentation', get_option('faaastpress_woocommerce_options', array()), true)); ?>>
                    <?php esc_html_e('Disable cart fragmentation', 'faaastpress'); ?>
                </label>
            </p>

            <p>
                <label>
                    <input disabled type="checkbox" name="woocommerce_options[]" value="disable_checkout_field_phone" <?php checked(in_array('disable_checkout_field_phone', get_option('faaastpress_woocommerce_options', array()), true)); ?>>
                    <?php esc_html_e('Disable phone field at checkout', 'faaastpress'); ?>
                </label>
            </p>
        </div>

        <?php
        wp_nonce_field('faaastpress_options', 'faaastpress_options_nonce');
        submit_button();
        ?>
    </form>
</div>
