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
            $name = ( isset($_POST['name']) ) ? $_POST['name'] : null;
            $email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
            $password = ( isset($_POST['password']) ) ? $_POST['password'] : null;

            if ( $name && $email && $password ) {

                $user = new User(
                    $name,
                    $email,
                    $password,
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

        } else {
            $_SESSION['user_register'] = 'failed';
            header('Location: ' . BASE_URL . 'user/create');
        }

    }

    public function login()
    {
        if ( isset($_POST) ) {
            $user = new User();
            $user = $user->login($_POST['email'], $_POST['password']);

            if ( $user && is_object($user) ) {
                $_SESSION['user'] = $user;
                if ( $user->role == 'admin' ) {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['login_error'] = 'login error!...';
            }
        }

        header('Location:'. BASE_URL);
    }
}