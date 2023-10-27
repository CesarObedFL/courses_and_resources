<?php


define('BASE_PATH', realpath(dirname(__FILE__)));

function autoload($class_name)
{
    $filename = BASE_PATH . '/Controllers/'. str_replace('\\', '/', $class_name) . '.php';
    include ($filename);
}

spl_autoload_register('autoload');