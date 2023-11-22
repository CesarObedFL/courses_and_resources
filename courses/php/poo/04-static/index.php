<?php

require_once "configuration.php";

Configuration::set_color('blue');
Configuration::set_environtment('develop');

echo Configuration::$color . "<br>";
echo Configuration::$environtment . "<br>";
echo Configuration::get_color() . "<br>";
echo Configuration::get_environtment() . "<br>";