<?php

class Utils {
    public static function delete_session($name) {
        if ( isset( $_SESSION[$name] ) ) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);    
        }

        return $name;
    }

    public static function redirect($url)
    {
        echo "<script>location.href = '".$url."';</script>";
    }

    public static function get_categories()
    {
        require_once BASE_URL.'/models/Category.php';
        return Category::get_all();
    }
}