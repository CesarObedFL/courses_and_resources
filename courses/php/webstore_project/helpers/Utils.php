<?php

class Utils {
    public static function delete_session($name) {
        if ( isset( $_SESSION[$name] ) ) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);    
        }

        return $name;
    }
}