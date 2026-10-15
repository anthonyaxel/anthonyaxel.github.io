<?php get_header(); ?>

<main class="terminal-container">
    <div class="lostgen-main-wrapper">
        
        <?php get_sidebar('shop'); ?>

        <div class="terminal-content-area">
            <header class="page-header" style="margin-bottom: 40px; border-bottom: 1px dashed var(--neon-green); padding-bottom: 20px;">
                <h1 class="glitch-title">// SYSTEM_INDEX</h1>
                <p style="font-family: var(--font-mono); font-size: 12px; color: var(--neon-green);">
                    <span class="blink">[STATUS: SCANNING_DIRECTORIES...]</span>
                </p>
            </header>

            <?php if ( have_posts() ) : ?>
                <div class="terminal-post-list">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('widget-terminal'); ?> style="margin-bottom: 30px; border: 1px solid #222; padding: 20px; background: var(--card-bg);">
                            <h2 class="widget-title" style="border: none; margin-bottom: 10px;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--neon-green); text-decoration: none;">
                                    > <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="entry-content" style="font-family: var(--font-mono); color: #ccc; line-height: 1.6;">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="cta-button" style="font-size: 0.8rem;">READ_MORE</a>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <div class="error-protocol">
                    <h2 class="glitch-title" style="color: var(--glitch-red);">404_NOT_FOUND</h2>
                    <p style="font-family: var(--font-mono);">SYSTEM_ERROR: The requested data node does not exist.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
