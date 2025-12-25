<?php 
/**
 * Template Name: Cyber Policies
 */
get_header(); ?>

<main class="policy-terminal">
    <div class="policy-header">
        <h1 class="glitch-text" data-text="SYSTEM_PROTOCOLS">SYSTEM_PROTOCOLS</h1>
        <div class="security-stamp">
            LEVEL_4_ACCESS_GRANTED // <?php echo date("Y-m-d"); ?>
        </div>
    </div>

    <article class="policy-content">
        <div class="policy-sidebar">
            <ul class="protocol-list">
                <li><a href="shipping-policy">[[01] SHIPPING_LOGISTICS</li>
                <li><a href="returns-policy">[02] RETURN_REFUND_POLICY</li>
                <li><a href="privacy-policy">[03] DATA_PRIVACY</li>
            </ul>
        </div>
        
        <div class="policy-body">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
    </article>
</main>

<?php get_footer(); ?>