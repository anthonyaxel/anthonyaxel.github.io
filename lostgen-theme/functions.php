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
    wp_enqueue_style('lostgen-style', get_stylesheet_uri());
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