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
            $product_included_into_cart = false;

            if ( is_object($product) ) {
            
                if (isset($_SESSION['cart']) ) {
                    foreach ( $_SESSION['cart'] as $index => $item ) {            
                        if ( $item['product_id'] == $_GET['product_id'] ) {
                            $_SESSION['cart'][$index]['units']++; 
                            $product_included_into_cart = true;
                        }
                    }
                }

                if ( !$product_included_into_cart ) {
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
        if ( isset($_SESSION['cart']) ) {
            unset($_SESSION['cart']);
        }
    }

}