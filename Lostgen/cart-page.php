<?php 
/**
 * Template Name: Cyber Cart
 */
get_header(); ?>

<main class="cyber-cart-wrapper">
    <div class="terminal-header">
        <h1 class="glitch-title">MANIFEST_LOADER // ARCHIVE_EDIT</h1>
        <div class="header-decoration">
            <span class="scan-line"></span>
            <p>>> SCANNING_ITEMS... COMPLETE.</p>
        </div>
    </div>

    <div class="cyber-cart-interface">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); // Pulls the [woocommerce_cart] shortcode ?>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>