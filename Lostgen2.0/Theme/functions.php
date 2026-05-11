<?php

function cybercity_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'cybercity')
    ));
}
add_action('after_setup_theme', 'cybercity_theme_setup');

function cybercity_enqueue_assets() {
    wp_enqueue_style(
        'cybercity-main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        '1.0'
    );

    wp_enqueue_script(
        'cybercity-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'cybercity_enqueue_assets');