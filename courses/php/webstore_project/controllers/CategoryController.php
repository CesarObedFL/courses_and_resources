<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/models/Category.php';

class CategoryController {

    public function index()
    {
        $category = new Category();
        $categories = $category->get_all();

        require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/categories/index.php';
    }
}