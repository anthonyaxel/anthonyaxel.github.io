<?php get_header(); ?>

<main class="terminal-container">
    <!-- Hero Section -->
    <section class="hero-uplink" style="text-align:center; padding: 100px 20px;">
        <h1 class="logo-lgs">LOST GENERATION</h1>
        <p style="letter-spacing: 3px;">[STATUS: UPLINK_ESTABLISHED]</p>
        <a href="#shop-all" class="cta-button">ACCESS ARCHIVE</a>
    </section>

    <!-- Optimized Wrapper (No inline styles) -->
    <div class="lostgen-main-wrapper">
        
        <?php get_sidebar('shop'); ?>

        <div class="terminal-content-area">
            
            <div class="terminal-protocol-header">
                <span class="blink">[SYSTEM_SCAN: NEW_RELEASES]</span>
            </div>

            <h2 style="color: var(--neon-green); margin-bottom: 20px;">// NEW_ARRIVALS</h2>
            <?php echo do_shortcode('[products limit="2" columns="2" orderby="date"]'); ?>

            <div class="terminal-protocol-header" style="margin-top: 60px;">
                <span class="blink">[ACCESSING_ARCHIVE...]</span>
            </div>

            <h2 id="shop-all" style="color: var(--neon-green); margin-bottom: 20px;">// DATA_ARCHIVE</h2>
            <?php echo do_shortcode('[products limit="9" columns="3"]'); ?>
            
        </div>
    </div>
</main>

<?php get_footer(); ?>