<?php

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
        
    }
}