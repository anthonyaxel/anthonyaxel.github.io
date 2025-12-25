<footer class="cyber-footer">
    <div class="footer-grid">
        <div class="footer-section">
            <h4 class="status-title"><span class="blink">●</span> SYSTEM_STATUS</h4>
            <ul class="footer-links">
                <li>UPLINK: <span class="neon-text">STABLE</span></li>
                <li>ENCRYPTION: <span class="neon-text">AES-256</span></li>
                <li>LOCAL_TIME: <span id="cyber-clock">00:00:00</span></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4 class="status-title">PROTOCOLS</h4>
            <ul class="footer-links">
                <li><a href="/shipping-policy">SHIPPING_LOGISTICS</a></li>
                <li><a href="/returns-policy">RETURN_REFUND</a></li>
                <li><a href="/privacy-policy">DATA_PRIVACY</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4 class="status-title">FREQUENCIES</h4>
            <ul class="footer-links">
                <li><a href="https://www.instagram.com/lostgen.studio/" target="_blank">INSTAGRAM_01</a></li>
                <li><a href="#">DISCORD_OFFLINE</a></li>
                <li><a href="mailto:support@lostgenerationstudio.com">ADMIN_CONTACT</a></li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p class="copyright">&copy; <?php echo date("Y"); ?> LOSTGEN.STUDIO // ALL_RIGHTS_RESERVED</p>
    </div>
</footer>

<script>
    // Live Terminal Clock
    function updateClock() {
        const now = new Date();
        document.getElementById('cyber-clock').innerText = now.toLocaleTimeString();
    }
    setInterval(updateClock, 1000);
</script>

<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
    <a class="cyber-cart-fixed" href="<?php echo wc_get_cart_url(); ?>" title="View Archive">
        <span class="glitch-text" data-text="CART_STATUS">CART_STATUS</span>
        <span class="cart-count-hex">
            [<?php echo WC()->cart->get_cart_contents_count(); ?>]
        </span>
    </a>
<?php endif; ?>