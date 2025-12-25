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

/**
 * Cyber-ify WooCommerce Email Subject Lines and Headings
 */
add_filter( 'woocommerce_email_subject_new_order', 'lostgen_custom_email_subject', 10, 2 );
add_filter( 'woocommerce_email_heading_new_order', 'lostgen_custom_email_heading', 10, 2 );

function lostgen_custom_email_subject( $subject, $order ) {
    return 'UPLINK_ESTABLISHED: Order #' . $order->get_order_number() . ' Received';
}

function lostgen_custom_email_heading( $heading, $order ) {
    return 'INVENTORY_RESERVED // AUTH_SUCCESS';
}

// Change the "Thank you for your order" text
add_filter( 'gettext', 'lostgen_change_email_text', 20, 3 );
function lostgen_change_email_text( $translated_text, $text, $domain ) {
    if ( $domain == 'woocommerce' ) {
        switch ( $translated_text ) {
            case 'Thank you for your order. It’s on hold until we confirm that payment has been received.' :
                $translated_text = 'DATA_RECEIVED. Your acquisition is pending payment verification. Standing by...';
                break;
            case 'Your order has been received and is now being processed.' :
                $translated_text = 'UPLINK_SUCCESS. Your threadz are being pulled from the archive now.';
                break;
        }
    }
    return $translated_text;
}