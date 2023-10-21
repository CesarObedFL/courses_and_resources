<?php

require_once 'Controllers/UserController.php';

if ( isset($_GET['controller']) && class_exists($_GET['controller']) ) {
    $controller_name = $_GET['controller'];
    $controller = new $controller_name();

    if ( isset($_GET['action']) && method_exists($user_controller, $_GET['action'])) {
        $action = $_GET['action'];
        $user_controller->create();
    
    } else {
        echo "Action inexistent!...";
    }
    
} else {
    echo "Controller inexistent!...";
}
