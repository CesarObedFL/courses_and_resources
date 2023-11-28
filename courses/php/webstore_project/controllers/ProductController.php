<?php

require_once BASE_URL.'/models/Product.php';

class ProductController {

    public function index()
    {
        require_once BASE_URL.'/views/products/index.php';
    }

    public function management() 
    {
        if ( isset( $_SESSION['admin'] ) ) {

            $products = Product::get_all();

            require_once BASE_URL.'/views/products/management.php';
            
        } else {
            Utils::redirect(PUBLIC_URL . 'index.php');
        }
    }
}