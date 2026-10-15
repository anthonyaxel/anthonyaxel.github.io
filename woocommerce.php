<?php get_header(); ?>

<main class="terminal-container">
    <div class="lostgen-main-wrapper">
        
        <?php 
        // Hide sidebar on Checkout & Cart pages to give forms full width
        if ( ! is_checkout() && ! is_cart() && ! is_account_page() ) : 
            get_sidebar('shop'); 
        endif; 
        ?>

        <div class="terminal-content-area">
            <section class="shop-container">
                
                <div style="font-family: var(--font-mono); font-size: 10px; color: var(--neon-green); margin-bottom: 20px;">
                    <span class="blink">[ACCESSING_DATABASE...]</span>
                    <span style="color: #666; margin-left: 10px;">// SECURE_UPLINK_STABLE</span>
                </div>

                <?php woocommerce_content(); ?>

            </section>
        </div>
    </div>
</main>

<?php get_footer(); ?>
