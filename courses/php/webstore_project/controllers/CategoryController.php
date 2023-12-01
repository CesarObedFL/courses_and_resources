<?php

require_once BASE_URL.'/models/Category.php';

class CategoryController {

    public function index()
    {
        $categories = Category::get_all();

        require_once BASE_URL.'/views/categories/index.php';
    }

    public function create()
    {
        if ( isset( $_SESSION['admin'] ) ) {
            require_once BASE_URL.'/views/categories/create.php';
        } else {
            Utils::redirect(PUBLIC_URL . 'index.php');
        }
    }

    public function save()
    {
        if ( isset( $_SESSION['admin'] ) ) {
            if ( isset($_POST) && isset($_POST['name']) ) {

                $category = new Category($_POST['name']);
                $is_saved = $category->save();
                if ($is_saved) {
                    $_SESSION['status'] = 'success';
                    $_SESSION['msg'] = 'Category saved successfully!...';
                } else {
                    $_SESSION['status'] = 'error';
                    $_SESSION['msg'] = 'Create category failed!...';
                }

                Utils::redirect(PUBLIC_URL . 'index.php?controller=Category&action=index');
            
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['msg'] = 'Create category failed!...';
                Utils::redirect(PUBLIC_URL . 'index.php?controller=Category&action=create');
            }
            
        } else {
            Utils::redirect(PUBLIC_URL . 'index.php');
        }
    }
}