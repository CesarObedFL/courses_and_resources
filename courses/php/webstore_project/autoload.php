<?php


define('BASE_PATH', realpath(dirname(__FILE__)));

function controllers_autoloader($class)
{
    // Adapt this depending on your directory structure
    $filename = BASE_PATH . '/controllers/'. str_replace('\\', '/', $class) . '.php';
    include($filename);
}

spl_autoload_register('controllers_autoloader');