<?php 
/**
 * Template Name: Cyber Checkout
 */
get_header(); ?>

<main class="cyber-checkout-container">
    <div class="checkout-header">
        <h1 class="glitch-text" data-text="SECURE_CHECKOUT">SECURE_CHECKOUT</h1>
        <div class="system-status">
            <span class="blink">●</span> ENCRYPTED_CONNECTION_ESTABLISHED
        </div>
    </div>

    <div class="checkout-wrapper">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); // This pulls the [woocommerce_checkout] shortcode ?>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>