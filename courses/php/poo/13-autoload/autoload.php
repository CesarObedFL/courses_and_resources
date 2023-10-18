<?php

define('BASE_PATH', realpath(dirname(__FILE__)));

function app_autoloader($class)
{
    // Adapt this depending on your directory structure
    $filename = BASE_PATH . '/Classes/'. str_replace('\\', '/', $class) . '.php';
    include($filename);
}


spl_autoload_register('app_autoloader');