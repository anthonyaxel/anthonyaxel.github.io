<?php
/**
 * The Sidebar containing the shop widget area.
 */
if ( ! is_active_sidebar( 'shop-sidebar' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area sidebar-terminal" role="complementary">
    <div class="terminal-sidebar-header">
        <span class="blink">●</span> FILTER_PROTOCOLS
    </div>
    <div class="sidebar-inner-scroll">
        <?php dynamic_sidebar( 'shop-sidebar' ); ?>
    </div>
    <div class="terminal-sidebar-footer">
        [SYSTEM_READY]
    </div>
</aside>