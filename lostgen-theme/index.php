<?php
/**
 * The main template file.
 * This is the mandatory fallback for all content that doesn't have a specific template.
 */

get_header(); ?>

<main class="cyber-terminal-main">
    <div class="lostgen-main-wrapper">
        
        <!-- Sidebar: Consistent with front-page and shop -->
        <?php get_sidebar('shop'); ?>

        <!-- Content Area -->
        <div class="terminal-content-area">
            <header class="page-header">
                <h1 class="glitch-title">// SYSTEM_INDEX</h1>
                <p class="terminal-protocol-header">
                    <span class="blink">[STATUS: SCANNING_DIRECTORIES...]</span>
                </p>
            </header>

            <?php if ( have_posts() ) : ?>
                <div class="terminal-post-list">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('widget-terminal'); ?>>
                            <h2 class="widget-title">
                                <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                                    > <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="entry-content" style="color: var(--neon-white); opacity: 0.8;">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="cta-button" style="display:inline-block; margin-top: 15px;">READ_MORE</a>
                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Simple Pagination -->
                <nav class="terminal-pagination" style="margin-top: 40px; font-family: var(--font-mono);">
                    <?php the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => '< [PREV_PAGE]',
                        'next_text' => '[NEXT_PAGE] >',
                    ) ); ?>
                </nav>

            <?php else : ?>
                <div class="error-protocol">
                    <h2 class="glitch-text" style="color: var(--glitch-red);">404_NOT_FOUND</h2>
                    <p>SYSTEM_ERROR: The requested data node does not exist in the current archive.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>