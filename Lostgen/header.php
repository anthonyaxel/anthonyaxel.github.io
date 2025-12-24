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
        <nav class="cyber-nav">
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#home" class="glitch-link">HOME</a></li>
            
                <li><a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="glitch-link">IDENTITY_LOG</a></li>
        
                <li class="cart-menu-item">
                    <a href="<?php echo wc_get_cart_url(); ?>" class="glitch-link">
                        CART [<span class="cart-count-nav"><?php echo WC()->cart->get_cart_contents_count(); ?></span>]
                    </a>
                </li>
            </ul>
        </nav>
    </header>