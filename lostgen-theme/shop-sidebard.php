<?php
/**
 * The sidebar containing the shop widget area.
 * Name: sidebar-shop.php
 */

if ( ! is_active_sidebar( 'shop-sidebar' ) ) {
    return;
}
?>

<aside id="secondary" class="sidebar-terminal">
    <div class="terminal-protocol-header">
        <span class="blink">Lost.Gen</span>
    </div>
    
    <?php dynamic_sidebar( 'shop-sidebar' ); ?>
    
    <!-- Manual Fallback if no widgets are added in Admin -->
    <?php if ( ! is_active_sidebar( 'shop-sidebar' ) ) : ?>
        <div class="widget-terminal">
            <h3 class="widget-title">// CATEGORY_INDEX</h3>
            <?php
            wp_list_categories( array(
                'taxonomy' => 'product_cat',
                'title_li' => '',
                'show_count' => true,
            ) );
            ?>
        </div>
    <?php endif; ?>

    <div class="terminal-footer-bits">
        <p>RE-LOCK_SYSTEM: ACTIVE</p>
    </div>
</aside>