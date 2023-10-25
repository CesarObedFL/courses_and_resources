<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/mvc/Controllers/UsersController.php';

if ( isset($_GET['controller']) && class_exists($_GET['controller']) ) {
    $controller_name = $_GET['controller'];
    $controller = new $controller_name();

    if ( isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];
        $controller->$action();
    
    } else {
        echo "Action inexistent!...";
    }
    
} else {
    echo "Controller inexistent!...";
}
