<?php get_header(); ?>

<main>
    <section class="hero-section" id="home">
        <div class="hero-content">
            <h1>LOST GENERATION</h1>
            <p>
                <img class="hero-image" src="https://cdn3.emoji.gg/emojis/9922-green-fire.gif" width="50" height="50" alt="Green_Fire">
                Hardest threadz in the H for the H
                <img class="hero-image" src="https://cdn3.emoji.gg/emojis/9922-green-fire.gif" width="50" height="50" alt="Green_Fire">
            </p>
            <a href="#new-arrivals" class="cta-button">SHOP THE DROP</a>
        </div>
    </section>

    <section class="product-grid" id="new-arrivals">
        <h2> NEW ARRIVALS </h2>
        <div class="products-container">
            <?php
            $args = array('post_type' => 'product', 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'DESC');
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post(); global $product; ?>
                <div class="product-card">
                    <div class="product-card-image"><?php the_post_thumbnail('medium'); ?></div>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo $product->get_price_html(); ?></p>
                    <a href="?add-to-cart=<?php echo get_the_ID(); ?>" class="add-to-cart">Add to Cart</a>
                </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </section>
    
    <section class="shop-all" id="shop-all">
        <h2 class="text-center mb-10">ALL THREADZ: THE ARCHIVE</h2>
        <div class="shop-layout">
            <aside class="sidebar">
                <h3>Filter by Type</h3>
                <?php wp_list_categories(array('taxonomy' => 'product_cat', 'title_li' => '')); ?>
            </aside>
            
            <div class="main-products-display">
                <div class="products-container">
                    <?php echo do_shortcode('[products limit="9" columns="3" orderby="date"]'); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>