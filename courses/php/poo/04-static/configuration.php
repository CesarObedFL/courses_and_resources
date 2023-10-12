<?php

class Configuration {

    public static $color;
    public static $environtment;

    public static function get_color()
    {
        return self::$color;
    }

    public static function set_color($color)
    {
        self::$color = $color;
    }

    public static function get_environtment()
    {
        return self::$environtment;
    }

    public static function set_environtment($environtment)
    {
        self::$environtment = $environtment;
    }

}