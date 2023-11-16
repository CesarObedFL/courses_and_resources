<?php

class UserController {

    public function index()
    {
        echo 'UserController::index';
    }

    public function create()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/users/create.php';
    }

    public function save()
    {
        if ( isset($_POST) ) {
            var_dump($_POST);
        }
    }
}