<?php
/**
 * The template for displaying all WooCommerce pages.
 * This is the "Master Wrapper" that ensures the sidebar and 
 * terminal styling are applied to every shop-related page.
 */

get_header(); ?>

<main class="cyber-terminal-main">
    <div class="lostgen-main-wrapper">
        
        <!-- Sidebar: Injects your sidebar-shop.php -->
        <?php get_sidebar('shop'); ?>

        <!-- Main Content Area -->
        <div class="terminal-content-area">
            <section class="shop-container">
                
                <div class="terminal-protocol-header" style="margin-bottom: 20px;">
                    <span class="blink">[ACCESSING_DATABASE...]</span>
                    <span style="color: #444; margin-left: 10px;">// SECURE_UPLINK_STABLE</span>
                </div>

                <?php 
                /**
                 * The woocommerce_content() function is the primary 
                 * way to display WooCommerce content in a theme.
                 */
                woocommerce_content(); 
                ?>

            </section>
        </div>
    </div>
</main>

<?php get_footer(); ?>