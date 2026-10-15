<?php
function lostgen_theme_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('title-tag');
    register_nav_menus(array('primary' => 'Primary Menu'));
}
add_action('after_setup_theme', 'lostgen_theme_setup');

function lostgen_enqueue_assets() {
    wp_enqueue_style('lostgen-style', get_template_directory_uri() . '/style.css', array(), time());
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Jacquard+12&display=swap');
}
add_action('wp_enqueue_scripts', 'lostgen_enqueue_assets');

// Register Sidebar
add_action('widgets_init', function() {
    register_sidebar(array(
        'name'          => 'Shop Sidebar',
        'id'            => 'shop-sidebar',
        'description'   => 'Add WooCommerce filters here.',
        'before_widget' => '<div id="%1$s" class="widget-terminal %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
});

// Force filters on homepage shortcodes
add_filter( 'woocommerce_is_filtered', 'lostgen_force_filtered_status' );
function lostgen_force_filtered_status( $is_filtered ) {
    if ( is_front_page() ) return true; 
    return $is_filtered;
}

add_filter( 'woocommerce_shortcode_products_query', 'lostgen_wire_filters_to_home', 10, 3 );
function lostgen_wire_filters_to_home( $query_args, $attributes, $type ) {
    if ( ! is_admin() && is_front_page() ) {
        if ( isset( $_GET['min_price'] ) && isset( $_GET['max_price'] ) ) {
            $query_args['meta_query'][] = array(
                'key'     => '_price',
                'value'   => array( esc_attr( $_GET['min_price'] ), esc_attr( $_GET['max_price'] ) ),
                'compare' => 'BETWEEN',
                'type'    => 'NUMERIC',
            );
        }
        if ( isset( $_GET['product_cat'] ) ) {
            $query_args['tax_query'][] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => esc_attr( $_GET['product_cat'] ),
            );
        }
    }
    return $query_args;
}

// WooCommerce Layout Wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action('woocommerce_before_main_content', function() {
    echo '<div class="lostgen-main-wrapper"><main class="terminal-content-area">';
}, 10);

add_action('woocommerce_after_main_content', function() {
    echo '</main></div>';
}, 10);

// Flush rewrite rules on theme activation
add_action('after_switch_theme', 'lostgen_flush_rewrites');
function lostgen_flush_rewrites() {
    flush_rewrite_rules();
}

// Force WooCommerce sessions to fix empty cart bug
add_action('init', function() {
    if ( function_exists('WC') && !is_admin() && WC()->session && !WC()->session->has_session() ) {
        WC()->session->set_customer_session_cookie(true);
    }
}, 1);