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
    // We're adding a version number (time) to force the browser to stop using old cached versions
    wp_enqueue_style('lostgen-style', get_template_directory_uri() . '/style.css', array(), time());
    
    // Cyber-font uplink
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Jacquard+12&display=swap');
}
add_action('wp_enqueue_scripts', 'lostgen_enqueue_assets');

// Register "Drops" Taxonomy
add_action('init', function() {
    register_taxonomy('product_drop', array('product'), array(
        'hierarchical' => true,
        'labels' => array('name' => 'Drops', 'singular_name' => 'Drop'),
        'show_in_rest' => true,
        'show_admin_column' => true,
    ));
});

add_action('widgets_init', function() {
    register_sidebar(array(
        'name'          => 'Shop Sidebar',
        'id'            => 'shop-sidebar',
        'description'   => 'Add WooCommerce filters here.',
        'before_widget' => '<div id="%1$s" class="widget-terminal %2$s">', // Ensures unique IDs + your custom class
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
});

/**
 * WIRE FILTERS TO HOMEPAGE SHORTCODES
 * Forces the [products] shortcode to respect sidebar filter parameters.
 */
add_filter( 'woocommerce_shortcode_products_query', 'lostgen_wire_filters_to_home', 10, 3 );

function lostgen_wire_filters_to_home( $query_args, $attributes, $type ) {
    if ( is_front_page() ) {
        // Handle Price Filtering
        if ( isset( $_GET['min_price'] ) ) {
            $query_args['meta_query'][] = array(
                'key'     => '_price',
                'value'   => [esc_attr( $_GET['min_price'] ), esc_attr( $_GET['max_price'] )],
                'compare' => 'BETWEEN',
                'type'    => 'NUMERIC',
            );
        }

        // Handle Product Category Filtering via URL
        if ( isset( $_GET['product_cat'] ) ) {
            $query_args['tax_query'][] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => esc_attr( $_GET['product_cat'] ),
            );
        }

        // Handle Attribute Filtering (e.g., Color, Size)
        foreach ( $_GET as $key => $value ) {
            if ( strpos( $key, 'filter_' ) === 0 ) {
                $attribute = str_replace( 'filter_', 'pa_', $key );
                $query_args['tax_query'][] = array(
                    'taxonomy' => $attribute,
                    'field'    => 'slug',
                    'terms'    => explode( ',', esc_attr( $value ) ),
                );
            }
        }
    }
    return $query_args;
}

add_action('init', 'lostgen_flush_rewrites');
function lostgen_flush_rewrites() {
    if (get_option('lostgen_setup_finished') !== 'yes') {
        flush_rewrite_rules();
        update_option('lostgen_setup_finished', 'yes');
    }
}