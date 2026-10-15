<?php get_header(); ?>

<main class="terminal-container">
    <section class="hero-uplink" style="text-align:center; padding: 100px 20px; border-bottom: 1px solid #222;">
        <h1 class="logo-lgs glitch-title" style="justify-content: center;">LOST GENERATION STUDIO</h1>
        <p style="letter-spacing: 3px; font-family: var(--font-mono); color: var(--neon-green);">[CLOTHING TO UNITE ALL]</p>
        <a href="#shop-all" class="cta-button" style="margin-top: 20px;">ACCESS ARCHIVE</a>
    </section>

    <div class="lostgen-main-wrapper">
        
        <div class="terminal-content-area" style="width: 100%;">
            
            <div class="terminal-protocol-header" style="font-family: var(--font-mono); font-size: 10px; color: var(--neon-green); margin-bottom: 20px;">
                <span class="blink">[SYSTEM_SCAN: NEW_RELEASES]</span>
            </div>

            <h2 style="color: var(--neon-green); margin-bottom: 20px; text-transform: uppercase;">// NEW_ARRIVALS</h2>
            <?php echo do_shortcode('[products limit="4" columns="4" orderby="date" order="DESC"]'); ?>

            <div class="terminal-protocol-header" style="font-family: var(--font-mono); font-size: 10px; color: var(--neon-green); margin-top: 60px; margin-bottom: 20px;">
                <span class="blink">[ACCESSING_ARCHIVE...]</span>
            </div>

            <h2 id="shop-all" style="color: var(--neon-green); margin-bottom: 20px; text-transform: uppercase;">// ARCHIVE</h2>
            <?php echo do_shortcode('[products limit="12" columns="4"]'); ?>
            
        </div>
    </div>
</main>

<?php get_footer(); ?>