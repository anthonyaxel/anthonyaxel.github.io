<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Hook to trigger WooCommerce checkout processing
do_action( 'woocommerce_before_checkout_form', $checkout );
?>

<div class="checkout-terminal-wrapper" style="max-width: 900px; margin: 20px auto; padding: 15px;">
    
    <div class="terminal-protocol-header" style="margin-bottom: 25px; border-bottom: 2px solid var(--neon-green); padding-bottom: 15px;">
        <!-- clamp() handles fluid shrinking scaling from 1.6rem on mobile up to 2.5rem on desktop -->
        <h2 class="glitch-title" style="color: var(--neon-green); margin: 0; font-size: clamp(1.6rem, 5vw, 2.5rem); line-height: 1.2;">// SECURE_CHECKOUT_PROTOCOL</h2>
        <span class="blink" style="font-family: var(--font-mono); font-size: 11px; color: var(--neon-green);">[ENCRYPTING_PAYMENT_GATEWAY...]</span>
    </div>

    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

        <?php if ( $checkout->get_checkout_fields() ) : ?>
            <!-- Layout logic handed off to stylesheet classes for maximum responsive stability -->
            <div class="lostgen-checkout-row">
                
                <!-- Billing Details -->
                <div class="col-1 lostgen-checkout-col">
                    <h3 style="color:var(--neon-green); font-family:var(--font-heading); font-size: clamp(1.2rem, 4vw, 1.6rem);">[BILLING_DETAILS]</h3>
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                </div>

                <!-- Order Review -->
                <div class="col-2 lostgen-checkout-col">
                    <h3 style="color:var(--neon-green); font-family:var(--font-heading); font-size: clamp(1.2rem, 4vw, 1.6rem);">[ORDER_SUMMARY]</h3>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
    </form>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>