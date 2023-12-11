<?php

class Utils {

    public static function redirect($url)
    {
        echo "<script>location.href = '".$url."';</script>";
    }

    public static function get_categories()
    {
        require_once BASE_URL.'/models/Category.php';
        return Category::get_all();
    }

    public static function delete_alert_messages()
    {
        if ( isset($_SESSION['status']) ) {
            //$_SESSION['errors'] = null;
            unset($_SESSION['status']);
        }
       
        if ( isset($_SESSION['msg']) ) {
            //$_SESSION['saved'] = null;
            unset($_SESSION['msg']);
        }
    }

    public static function get_cart_stats()
    {
        $cart_stats = array(
            'products_amount' => 0,
            'units' => 0,
            'total' => 0
        );

        if ( isset($_SESSION['cart']) ) {
            $cart_stats['product_amount'] = count( $_SESSION['cart'] );

            foreach( $_SESSION['cart'] as $product ) {
                $cart_stats['units'] += $product['units'];
                $cart_stats['total'] += ($product['price'] * $product['units']);
            }
        }

        return $cart_stats;
    }
}