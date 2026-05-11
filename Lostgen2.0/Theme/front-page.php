<?php get_header(); ?>

<section class="hero-section">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1>WELCOME TO THE UNDERGROUND</h1>
        <p>Cyber fashion, graffiti culture, neon tech, and streetwear.</p>

        <a href="<?php echo site_url('/shop'); ?>" class="shop-btn">
            Enter The Store
        </a>
    </div>
</section>

<section class="featured-products">
    <h2>Featured Drops</h2>

    <?php echo do_shortcode('[products limit="4" columns="4"]'); ?>
</section>

<?php get_footer(); ?>