<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="terminal-header">
    <a href="<?php echo home_url(); ?>" class="logo-lgs">
        <img src="<?php echo get_template_directory_uri(); ?>/LGS_UR_logo.jpg" alt="LGS Logo" class="logo-img" onerror="this.style.display='none'">
        LGS
    </a>
    <nav>
        <?php 
        if(has_nav_menu('primary')) {
            wp_nav_menu(array('theme_location' => 'primary', 'container' => false)); 
        } else {
            // Fallback Menu
            echo '<ul><li><a href="'.home_url().'">HOME</a></li><li><a href="'.wc_get_page_permalink('shop').'">SHOP</a></li></ul>';
        }
        ?>
        <a href="<?php echo wc_get_cart_url(); ?>" style="color:var(--neon-green); margin-left:20px; font-family:var(--font-mono);">
            [CART: <?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>]
        </a>
    </nav>
</header>
