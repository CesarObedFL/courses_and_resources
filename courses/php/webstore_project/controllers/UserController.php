<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/models/User.php';

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
            $user = new User(
                $_POST['name'],
                $_POST['email'],
                $_POST['password'],
                'role',
                'image'
            );
            $user->save();
        }
    }
}