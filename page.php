<?php get_header(); ?>

<!-- 1. Added box-sizing, fluid margins, and fluid padding for mobile screen edges -->
<main style="max-width: 900px; width: 100%; margin: clamp(15px, 5vw, 40px) auto; padding: clamp(12px, 4vw, 20px); box-sizing: border-box; font-family: var(--font-mono); color: #fff;">
    
    <!-- 2. clamp() seamlessly scales the title from 1.3rem on phones up to 1.8rem on desktop -->
    <h1 style="color: var(--neon-green); border-bottom: 1px dashed var(--neon-green); padding-bottom: 10px; font-size: clamp(1.3rem, 4vw, 1.8rem); line-height: 1.3; margin-top: 0;">
        // STATUS: <?php the_title(); ?>
    </h1>
    
    <!-- 3. CRITICAL MOBILE FIX: Safely wraps massive WooCommerce tables so they scroll instead of breaking the phone viewport -->
    <div class="terminal-mobile-scroll-wrapper" style="width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch;">
        <?php 
        while ( have_posts() ) : the_post(); 
            the_content(); 
        endwhile; 
        ?>
    </div>
</main>

<?php get_footer(); ?>