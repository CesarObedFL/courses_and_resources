<?php

class Utils {

    public static function redirect($url)
    {
        echo "<script>location.href = '".$url."';</script>";
    }

    public static function get_categories()
    {
        require_once BASE_URL.'/models/Category.php';
        return Category::get_all();
    }

    public static function delete_alert_messages()
    {
        if ( isset($_SESSION['status']) ) {
            //$_SESSION['errors'] = null;
            unset($_SESSION['status']);
        }
       
        if ( isset($_SESSION['msg']) ) {
            //$_SESSION['saved'] = null;
            unset($_SESSION['msg']);
        }
    }
}