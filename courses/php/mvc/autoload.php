<?php


define('BASE_PATH', realpath(dirname(__FILE__)));

function autoload($class_name)
{
    //$filename = BASE_PATH . '/Controllers/'. str_replace('\\', '/', $class_name) . '.php';
    
    if (str_contains($class_name, 'Controller')) {
        $filefolder = 'Controllers/';

    } else {
        $filefolder = 'Models/';
    }

    $filename = BASE_PATH . '/' . $filefolder . str_replace('\\', '/', $class_name) . '.php';
    include ($filename);
}

spl_autoload_register('autoload');