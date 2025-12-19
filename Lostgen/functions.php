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