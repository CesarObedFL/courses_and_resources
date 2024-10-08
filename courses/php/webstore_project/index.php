<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/config/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/config/Parameters.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/helpers/Utils.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/layout/header.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/layout/aside.php';

if (isset($_GET['controller'])) {
    $controller_name = $_GET['controller'].'Controller';

} else if( !isset($_GET['controller']) && !isset($_GET['action'])) {
    $controller_name = DEFAULT_CONTROLLER;

} else {
    $error = new ErrorController();
    $error->index();
    exit();
}




if ( class_exists($controller_name) ) {
    $controller = new $controller_name();

    if ( isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];
        $controller->$action();
    
    } else if( !isset($_GET['controller']) && !isset($_GET['action'])) {
        $action = DEFAULT_ACTION;
        $controller->$action();

    } else {
        $error = new ErrorController();
        $error->index();
    }
    
} else {
    $error = new ErrorController();
    $error->index();
}


require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/layout/footer.php';