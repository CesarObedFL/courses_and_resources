<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/models/User.php';

class UserController {

    public function index()
    {
        echo 'UserController::index';
    }

    public function register()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/webstore_project/views/users/register.php';
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
            $is_save = $user->save();

            if ( $is_save ) {
                $_SESSION['user_register'] = 'Register completed!!!...';
            } else {
                $_SESSION['user_register'] = 'An error has happened when the user wes registered';
            }

        } else {
            $_SESSION['user_register'] = 'failed';
            header('Location: ' . BASE_URL . 'user/create');
        }

    }
}