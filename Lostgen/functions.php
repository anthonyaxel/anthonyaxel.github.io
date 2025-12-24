<?php
function lostgen_setup() {
    // Enable WooCommerce support
    add_theme_support('woocommerce');
    // Register the header menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'lostgen'),
    ));
}
add_action('after_setup_theme', 'lostgen_setup');

// Enqueue Tailwind and Fonts
function lostgen_scripts() {
    wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', array(), null, false);
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Jacquard+12&family=Science+Gothic:wght@100..900&display=swap', array(), null);
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'lostgen_scripts');

/**
 * Change the "Cart Empty" message text
 */
add_filter( 'wc_empty_cart_message', 'lostgen_empty_cart_message', 10, 1 );
function lostgen_empty_cart_message( $message ) {
    return '<h2 class="glitch-text">SYSTEM_ERROR: NO_ITEMS_DETECTED</h2>
            <p>Your archive is currently empty. Initiate uplink to acquire threadz.</p>';
}

/**
 * Rename My Account Tabs to Cyberpunk Terms
 */
add_filter( 'woocommerce_account_menu_items', 'lostgen_rename_account_tabs' );
function lostgen_rename_account_tabs( $items ) {
    $items['dashboard'] = 'Overview';
    $items['orders']    = 'Acquisitions'; // Was "Orders"
    $items['downloads'] = 'Data_Files';   // Was "Downloads"
    $items['edit-address'] = 'Drop_Coords'; // Was "Addresses"
    $items['edit-account'] = 'Profile_Edit';
    $items['customer-logout'] = 'Disconnect';
    return $items;
}

/**
 * Ensure cart contents count updates via AJAX
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'lostgen_cart_count_fragments' );
function lostgen_cart_count_fragments( $fragments ) {
    ob_start();
    ?>
    <span class="cart-count-nav"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <?php
    $fragments['span.cart-count-nav'] = ob_get_clean();
    return $fragments;
}