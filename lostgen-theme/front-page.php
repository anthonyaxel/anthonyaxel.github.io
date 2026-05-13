<?php get_header(); ?>

<main class="terminal-container">
    <section class="hero-uplink" style="text-align:center; padding: 100px 20px;">
        <h1 class="logo-lgs">LOST GENERATION</h1>
        <p style="letter-spacing: 3px;">[STATUS: UPLINK_ESTABLISHED]</p>
        <a href="#shop-all" class="cta-button">ACCESS ARCHIVE</a>
    </section>

    <!-- Use the CLASS here, not inline styles -->
    <div class="lostgen-main-wrapper">
        
        <?php get_sidebar('shop'); ?>

        <div class="terminal-content-area">
            <h2 style="color: var(--neon-green);">// NEW_ARRIVALS</h2>
            <?php echo do_shortcode('[products limit="2" columns="2" orderby="date"]'); ?>

            <h2 id="shop-all" style="color: var(--neon-green); margin-top: 60px;">// DATA_ARCHIVE</h2>
            <?php echo do_shortcode('[products limit="9" columns="3"]'); ?>
        </div>
        
    </div>
</main>

<?php get_footer(); ?>