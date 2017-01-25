<?php

/*
 * Add product type declaration
 */
function fd_create_films_product_type()
{
    class WC_Product_Film extends \WC_Product_Simple
    {
        public function __construct($product)
        {
            $this->product_type = 'product_film';
            $this->virtual = 'yes';

            parent::__construct($product);

            // Load all meta fields
            $this->product_custom_fields = get_post_meta( $this->id, '', true );
        }
    }
}
add_action('init', 'fd_create_films_product_type');
