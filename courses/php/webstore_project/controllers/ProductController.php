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
                $image = false;
                $file = $_FILES['image'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if ( $mimetype == "image/jpg" && $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/jpg" ) {
                    if ( !is_dir('assets/img/products') ) {
                        mkdir('assets/img/products', 0777, true);
                    }
                    move_uploaded_file($file['tmp_name'], 'assets/img/products/'.$filename);
                    $image = true;
                } 

                if ( $name && $description && $price && $stock && $category && $offer & $image ) {

                    $product = new Product(
                        $_POST['name'],
                        $_POST['description'],
                        $_POST['price'],
                        $_POST['stock'],
                        $_POST['category'],
                        $_POST['offer'],
                        $filename
                    );

                    $is_saved = $product->save();
                    if ( $is_saved ) {
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

    public function edit()
    {
        if ( isset( $_SESSION['admin'] ) ) {
            if (isset($_GET['id'])) {
                $product = Product::retrieve($_GET['id']);
                require_once BASE_URL.'/views/products/edit.php';
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['msg'] = 'you need to select a valid product!...';
                Utils::redirect(PUBLIC_URL . 'index.php?controller=Product&action=management');
            }
        } else {
            Utils::redirect(PUBLIC_URL . 'index.php');
        }
    }

    public function update()
    {
        if ( isset( $_SESSION['admin'] ) ) {
            if (isset($_POST)) {
                var_dump($_POST);
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['msg'] = 'you need to complete al the input fields!...';
                Utils::redirect(PUBLIC_URL . 'index.php?controller=Product&action=management');
            }
        } else {
            Utils::redirect(PUBLIC_URL . 'index.php');
        }
    }

    public function delete()
    {
        if ( isset( $_SESSION['admin'] ) ) {
            if ( isset($_GET['id']) ) {
                $is_delete = Product::delete($_GET['id']);
                if ( $is_delete ) {
                    $_SESSION['status'] = 'success';
                    $_SESSION['msg'] = 'Delete product successfully!...';
                } else {
                    $_SESSION['status'] = 'error';
                    $_SESSION['msg'] = 'Delete product failed!...';
                }
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['msg'] = 'Delete product failed!...';
            }

            Utils::redirect(PUBLIC_URL . 'index.php?controller=Product&action=management');

        } else {
            Utils::redirect(PUBLIC_URL . 'index.php');
        }
    }
    
}