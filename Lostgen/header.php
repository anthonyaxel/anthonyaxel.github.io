<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="main-header">
        <div class="logo"><?php bloginfo('name'); ?></div>
        <nav class="main-nav">
            <ul>
                <li><a href="#new-arrivals">New Arrivals</a></li>
                <li><a href="#shop-all">Shop All</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#cart">Cart (0)</a></li>
            </ul>
        </nav>
    </header>