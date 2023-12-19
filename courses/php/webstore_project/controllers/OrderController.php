<?php

require_once BASE_URL.'/models/Order.php';
require_once BASE_URL.'/models/Item.php';

class OrderController {

    public function index()
    {
        if ( isset( $_SESSION['admin'] ) ) {

            $orders = Order::get_all();
            require_once BASE_URL.'/views/orders/index.php';

        } else {
            Utils::redirect(PUBLIC_URL . 'index.php');
        }
    }

    public function my_orders()
    {
        if ( isset($_SESSION['user']) ) {
            $orders = Order::my_orders();
            require_once BASE_URL.'/views/orders/my_orders.php';

        } else {
            $_SESSION['msg'] = 'You need to login!...';
            $_SESSION['status'] = 'error';
            Utils::redirect(PUBLIC_URL . 'index.php');
        }

    }

    public function order_detail()
    {
        if ( isset($_SESSION['user']) ) {
            if ( isset($_GET['order_id']) ) {
                
                $order = Order::retrieve($_GET['order_id']);
                $products = Order::get_products_by_order_id($_GET['order_id']);
                require_once BASE_URL.'/views/orders/order_detail.php';

            } else {
                $_SESSION['msg'] = 'Incorrect order id!...';
                $_SESSION['status'] = 'error';
                Utils::redirect(PUBLIC_URL . 'index.php?controller=Order&action=my_orders');
            }

        } else {

            $_SESSION['msg'] = 'You need to login!...';
            $_SESSION['status'] = 'error';
            Utils::redirect(PUBLIC_URL . 'index.php?controller=Cart&action=show');
        }
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

                $is_the_order_saved = $order->save();
                
                foreach( $_SESSION['cart'] as $product ) {
                    $item = new Item(
                        $order->getId(),
                        $product['product_id'],
                        $product['units']
                    );
                    $item->save();
                }

                if ( $is_the_order_saved ) {
                    unset($_SESSION['cart']);

                    $_SESSION['status'] = 'success';
                    $_SESSION['msg'] = 'Order paid successfully!...';
                }

                Utils::redirect(PUBLIC_URL . 'index.php?controller=Order&action=my_orders');

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