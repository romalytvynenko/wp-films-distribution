<?php

namespace App\Modules;


class FilmsProduct extends Module
{
    /**
     * Add hooks for module
     */
    public function init()
    {
        add_filter('product_type_selector', [$this, 'addFilmToDropdown']);

        add_action( 'woocommerce_product_options_general_product_data', [&$this, 'subscription_pricing_fields'] );
        add_action( 'admin_footer', [&$this, 'simple_subscription_custom_js'] );
    }

    /**
     * Add film product to types dropdown
     *
     * @param $types
     * @return mixed
     */
    public function addFilmToDropdown($types)
    {
        $types['film_product'] = __('Film Product');

        return $types;
    }

    /**
     * If you are not having custom pices
     */
    public function simple_subscription_custom_js() {
        if ( 'product' != get_post_type() ) return;
        ?><script>
            jQuery( document ).ready( function() {
                jQuery('.options_group.pricing').addClass('show_if_subscription').show();
                var input_virtual = jQuery('input#_virtual');
                input_virtual.parent().addClass('show_if_subscription').show();
                input_virtual.prop('checked', true);
            });
        </script>
        <?php
    }
    /**
     * This is to show price if not have custom prices @see WP_Product_Simple
     */
    public function subscription_pricing_fields() {
        echo '<div class="options_group show_if_subscription"></div>';
    }
}