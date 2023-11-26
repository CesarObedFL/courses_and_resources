<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/models/Category.php';

class CategoryController {

    public function index()
    {
        $category = new Category();
        $categories = $category->get_all();

        require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/categories/index.php';
    }

    public function create()
    {
        if ( isset( $_SESSION['admin'] ) ) {
            require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/categories/create.php';
        } else {
            header("Location:" . $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/index.php');
        }
    }

    public function save()
    {
        if ( isset( $_SESSION['admin'] ) ) {
            if ( isset($_POST) && isset($_POST['name']) ) {
                $category = new Category($_POST['name']);
                $category->save();
                header("Location:" . $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/categories/index.php');
            } else {
                header("Location:" . $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/categories/create.php');
            }
        } else {
            header("Location:" . $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/index.php');
        }
    }
}