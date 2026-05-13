<header class="terminal-header">
    <a href="<?php echo home_url(); ?>" class="logo-lgs">
        <img src="<?php echo get_template_directory_uri(); ?>/LGS_UR_logo.jpg" alt="LGS Logo" class="logo-img">
        LGS
    </a>
    <nav>
        <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false)); ?>
        <a href="<?php echo wc_get_cart_url(); ?>" style="color:var(--neon-green); margin-left:20px; font-family:var(--font-mono);">
            [CART: <?php echo WC()->cart->get_cart_contents_count(); ?>]
        </a>
    </nav>
</header>