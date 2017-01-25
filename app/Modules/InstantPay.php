<?php

namespace App\Modules;


class InstantPay extends Module
{

    /**
     * Add hooks for module
     */
    public function init()
    {
        add_filter('add_to_cart_redirect', [$this, 'redirectToCheckout']);
        add_filter('woocommerce_product_single_add_to_cart_text', [$this, 'payNowText']);

    }

    /**
     * Redirect to checkout instead of cart
     *
     * @return mixed
     */
    public function redirectToCheckout()
    {
        global $woocommerce;
        $checkout_url = $woocommerce->cart->get_checkout_url();
        return $checkout_url;
    }

    /**
     * Set "Pay Now" text on cart button
     *
     * @return string|void
     */
    public function payNowText()
    {
        return __('Pay Now', 'woocommerce');
    }
}