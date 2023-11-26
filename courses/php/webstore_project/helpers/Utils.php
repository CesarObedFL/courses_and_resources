<?php

class Utils {
    public static function delete_session($name) {
        if ( isset( $_SESSION[$name] ) ) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);    
        }

        return $name;
    }

    public static function get_categories()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/models/Category.php';
        $category = new Category();
        $categories = $category->get_all();

        return $categories;
    }
}