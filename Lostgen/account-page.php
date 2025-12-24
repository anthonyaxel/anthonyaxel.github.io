<?php 
/**
 * Template Name: Cyber Account
 */
get_header(); ?>

<main class="cyber-account-wrapper">
    <div class="account-terminal-header">
        <h1 class="glitch-text" data-text="IDENTITY_UPLINK">IDENTITY_UPLINK</h1>
        <?php if ( is_user_logged_in() ): $current_user = wp_get_current_user(); ?>
            <div class="user-meta-data">
                <span class="blink">●</span> USER: <?php echo strtoupper($current_user->user_login); ?> // STATUS: CONNECTED
            </div>
        <?php endif; ?>
    </div>

    <div class="cyber-account-grid">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); // Pulls the [woocommerce_my_account] shortcode ?>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>