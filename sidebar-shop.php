<?php
/**
 * Name: sidebar-shop.php
 * Note: Filename MUST be exactly 'sidebar-shop.php'
 */
?>
<aside id="secondary" class="sidebar-terminal">
    <div style="font-family: var(--font-mono); font-size:10px; color:var(--neon-green); margin-bottom:20px;">
        <span class="blink">[LGS]</span>
    </div>

    <?php if ( is_active_sidebar( 'shop-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'shop-sidebar' ); ?>
    <?php else : ?>
        <div class="widget-terminal">
            <h3 class="widget-title">// ERROR: NO_WIDGETS</h3>
            <p style="font-family: var(--font-mono); font-size:12px; color: #888;">Go to Appearance > Widgets and drag your filters into "Shop Sidebar".</p>
        </div>
    <?php endif; ?>
</aside>
