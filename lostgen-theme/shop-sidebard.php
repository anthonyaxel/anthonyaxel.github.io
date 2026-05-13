<?php
/**
 * Name: sidebar-shop.php
 */
?>
<aside id="secondary" class="sidebar-terminal">
    <!-- This is a test message to confirm the file is actually loading -->
    <div style="font-size:10px; color:red; margin-bottom:10px;">[DEBUG] SYSTEM_CHECK: SIDEBAR_LOADED</div>

    <?php if ( is_active_sidebar( 'shop-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'shop-sidebar' ); ?>
    <?php else : ?>
        <div class="widget-terminal">
            <h3 class="widget-title">// ERROR: NO_WIDGETS</h3>
            <p style="font-size:12px;">Go to Appearance > Widgets and drag your filters into "Shop Sidebar".</p>
        </div>
    <?php endif; ?>
</aside>