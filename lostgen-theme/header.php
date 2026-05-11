<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="terminal-header">
    <a href="<?php echo home_url(); ?>" class="logo-lgs">LGS</a>
    <nav>
        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
        <a href="<?php echo wc_get_cart_url(); ?>" style="color:var(--neon-green); margin-left:20px;">
            CART [<?php echo WC()->cart->get_cart_contents_count(); ?>]
        </a>
    </nav>
</header>