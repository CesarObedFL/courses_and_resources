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
                // validating data
                $name = isset($_POST['name']) ? $_POST['name'] : false;
                $description = isset($_POST['description']) ? $_POST['description'] : false;
                $price = isset($_POST['price']) ? $_POST['price'] : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
                $category = isset($_POST['category']) ? $_POST['category'] : false;
                $offer = isset($_POST['offer']) ? $_POST['offer'] : false;
                $image = isset($_POST['image']) ? $_POST['image'] : false;

                if ($name && $description && $price && $stock && $category && $offer & $image) {

                    $product = new Product(
                        $_POST['name'],
                        $_POST['description'],
                        $_POST['price'],
                        $_POST['stock'],
                        $_POST['category'],
                        $_POST['offer'],
                        '$_POST[image]'
                    );
                    //$is_saved = $product->save();
                    if ( true ) {
                        $_SESSION['status'] = 'success';
                        $_SESSION['msg'] = 'Product saved successfully!...';
                    }

                    Utils::redirect(PUBLIC_URL . 'index.php?controller=Product&action=management');

                } else {
                    $_SESSION['status'] = 'error';
                    $_SESSION['msg'] = 'Create product failed!, complete all the inputs...';
                    Utils::redirect(PUBLIC_URL . 'index.php?controller=Product&action=create');
                }

            }
            
        } else {
            Utils::redirect(PUBLIC_URL . 'index.php');
        }
    }
    
}