<?php

require_once BASE_URL.'/models/Product.php';

class CartController {

    public function index()
    {
        echo 'OrderController::index';
    }

    public function add_to_cart()
    {
        if ( isset($_GET['product_id']) ) {

            $product = Product::retrieve($_GET['product_id']);
            if ( is_object($product) ) {
                if (isset($_SESSION['cart']) ) {

                } else {
                    
                    $_SESSION['cart'][] = array(
                        'product_id' => $product->id,
                        'prize' => $product->prize,
                        'units' => 1
                    );
                }
            }
        } else {
            Utils::redirect(PUBLIC_URL . 'index.php');
        }
    }

    public function remove()
    {

    }

    public function delete()
    {

    }

}