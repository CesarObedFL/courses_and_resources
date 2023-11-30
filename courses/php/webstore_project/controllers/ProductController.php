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

    public function create()
    {
        require_once BASE_URL.'/views/products/create.php';
    }

    public function save()
    {
        
        if ( isset( $_SESSION['admin'] ) ) {

            if ( isset($_POST) ) {
                var_dump($_POST);
            }
            
        } else {
            Utils::redirect(PUBLIC_URL . 'index.php');
        }
    }
}