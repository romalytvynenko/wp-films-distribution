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
            $this->downloadable = 'yes';
            $this->manage_stock = 'no';

            parent::__construct($product);
        }
    }
}
add_action('init', 'fd_create_films_product_type');
