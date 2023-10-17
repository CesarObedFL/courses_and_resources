<?php


function app_autoloader($class)
{
    require_once 'models/'. $class . '.php';
}


spl_autoload_register('app_autoloader');