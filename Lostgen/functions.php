<?php

/**
 * 1. THEME SETUP & WOOCOMMERCE SUPPORT
 */
function lostgen_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'lostgen'),
    ));
}
add_action('after_setup_theme', 'lostgen_setup');

/**
 * 2. SCRIPTS & GOOGLE FONTS
 */
function lostgen_scripts() {
    // Combined Google Fonts for better performance
    wp_enqueue_style('lostgen-fonts', 'https://fonts.googleapis.com/css2?family=Jacquard+12&family=Jacquard+12+Charted&family=Science+Gothic:wght@100..900&display=swap', array(), null);
    
    // Tailwind CDN
    wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', array(), null, false);
    
    // Main Stylesheet
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'lostgen_scripts');

/**
 * 3. WORDPRESS CUSTOMIZER INTEGRATION (Appearance > Customize)
 */
function lostgen_customize_register( $wp_customize ) {
    // New Panel for Terminal Settings
    $wp_customize->add_section( 'lostgen_terminal_settings' , array(
        'title'      => __( 'LostGen Terminal Settings', 'lostgen' ),
        'priority'   => 30,
    ) );

    // Accent Color Picker
    $wp_customize->add_setting( 'lostgen_accent_color' , array('default' => '#43ef43', 'transport' => 'refresh'));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lostgen_accent_color', array(
        'label'    => __( 'Neon Accent Color', 'lostgen' ),
        'section'  => 'lostgen_terminal_settings',
    ) ) );

    // Glitch Intensity Text Field
    $wp_customize->add_setting( 'lostgen_glitch_speed' , array('default' => '0.3s', 'transport' => 'refresh'));
    $wp_customize->add_control( 'lostgen_glitch_speed', array(
        'label'      => __( 'Glitch Speed (e.g. 0.1s for fast)', 'lostgen' ),
        'section'    => 'lostgen_terminal_settings',
        'type'       => 'text',
    ) );
}
add_action( 'customize_register', 'lostgen_customize_register' );

/**
 * 4. INJECT CUSTOMIZER VALUES INTO CSS
 */
function lostgen_customizer_head_css() {
    ?>
    <style type="text/css">
        :root {
            --neon-green: <?php echo get_theme_mod('lostgen_accent_color', '#43ef43'); ?>;
            --glitch-speed: <?php echo get_theme_mod('lostgen_glitch_speed', '0.3s'); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'lostgen_customizer_head_css' );

/**
 * 5. WOOCOMMERCE FUNCTIONALITY & CYBER-TEXT
 */
 
// AJAX Cart Update
add_filter( 'woocommerce_add_to_cart_fragments', 'lostgen_cart_count_fragments' );
function lostgen_cart_count_fragments( $fragments ) {
    ob_start();
    echo '<span class="cart-count-nav">' . WC()->cart->get_cart_contents_count() . '</span>';
    $fragments['span.cart-count-nav'] = ob_get_clean();
    return $fragments;
}

// Custom Empty Cart Message
add_filter( 'wc_empty_cart_message', 'lostgen_empty_cart_message', 10, 1 );
function lostgen_empty_cart_message( $message ) {
    return '<h2 class="glitch-text">SYSTEM_ERROR: NO_ITEMS_DETECTED</h2>
            <p>Your archive is currently empty. Initiate uplink to acquire threadz.</p>';
}

// Rename Account Tabs
add_filter( 'woocommerce_account_menu_items', 'lostgen_rename_account_tabs' );
function lostgen_rename_account_tabs( $items ) {
    $items['dashboard'] = 'Overview';
    $items['orders']    = 'Acquisitions';
    $items['downloads'] = 'Data_Files';
    $items['edit-address'] = 'Coordinates';
    $items['edit-account'] = 'Profile_Edit';
    $items['customer-logout'] = 'Disconnect';
    return $items;
}

/**
 * 6. CUSTOM TAXONOMY: DROPS
 */
function lg_register_drops_taxonomy() {
    register_taxonomy('product_drop', array('product'), array(
        'hierarchical' => true,
        'labels' => array('name' => 'Drops', 'singular_name' => 'Drop'),
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'drop'),
    ));
}
add_action('init', 'lg_register_drops_taxonomy');

/**
 * 7. EMAIL CUSTOMIZATION
 */
add_filter( 'woocommerce_email_subject_new_order', function($subject, $order){ return 'UPLINK: Order #' . $order->get_order_number(); }, 10, 2 );
add_filter( 'woocommerce_email_heading_new_order', function($heading, $order){ return 'INVENTORY_RESERVED // AUTH_SUCCESS'; }, 10, 2 );

add_filter( 'gettext', 'lostgen_change_email_text', 20, 3 );
function lostgen_change_email_text( $translated_text, $text, $domain ) {
    if ( $domain == 'woocommerce' ) {
        if (strpos($translated_text, 'Thank you for your order') !== false) return 'DATA_RECEIVED. Acquisition pending...';
        if (strpos($translated_text, 'Your order has been received') !== false) return 'UPLINK_SUCCESS. Pulling threadz from archive.';
    }
    return $translated_text;
}

function lostgen_register_shop_sidebar() {
    register_sidebar( array(
        'name'          => 'Shop Sidebar',
        'id'            => 'shop-sidebar',
        'before_widget' => '<div class="widget-terminal %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'lostgen_register_shop_sidebar' );