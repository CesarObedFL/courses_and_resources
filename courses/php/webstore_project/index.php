<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/autoload.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/layout/header.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/layout/aside.php';

if ( isset($_GET['controller']) && class_exists($_GET['controller'].'Controller') ) {
    $controller_name = $_GET['controller'].'Controller';
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


require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/layout/footer.php';