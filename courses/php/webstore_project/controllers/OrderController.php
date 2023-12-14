<?php

require_once BASE_URL.'/models/Order.php';

class OrderController {

    public function index()
    {
        echo 'OrderController::index';
    }

    public function payment_form()
    {
        if ( isset($_SESSION['user']) ) {
            require_once BASE_URL.'/views/orders/payment_form.php';

        } else {

            $_SESSION['msg'] = 'You need to login to pay!...';
            $_SESSION['status'] = 'error';
            Utils::redirect(PUBLIC_URL . 'index.php?controller=Cart&action=show');
        }
    }

    public function confirm()
    {
        if ( isset($_SESSION['user'])) {

            $country = isset($_POST['country']) ? $_POST['country'] : false;
            $state = isset($_POST['state']) ? $_POST['state'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;

            if ( $country && $state && $address ) {

                $cart_stats = Utils::get_cart_stats();

                $order = new Order(
                    $_POST['country'], 
                    $_POST['state'], 
                    $_POST['address'], 
                    $cart_stats['units'],
                    $cart_stats['total'], 
                );

                $is_saved = $order->save();
                if ( $is_saved ) {
                    $_SESSION['status'] = 'success';
                    $_SESSION['msg'] = 'Order paid successfully!...';
                }

                Utils::redirect(PUBLIC_URL . 'index.php?controller=Order&action=list');

            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['msg'] = 'Paying order failed!, complete all the inputs...';
                Utils::redirect(PUBLIC_URL . 'index.php?controller=Order&action=payment_form');
            }

        } else {
            Utils::redirect(PUBLIC_URL . 'index.php');
        }
    }
}