<?php

require_once BASE_URL.'/models/User.php';

class UserController {

    public function index()
    {
        echo 'UserController::index';
    }

    public function register()
    {
        require_once BASE_URL.'/views/users/register.php';
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
                    'user',
                    'image'
                );
                $is_save = $user->save();

                if ( $is_save ) {
                    $_SESSION['status'] = 'success';
                    $_SESSION['msg'] = 'Register completed!!!...';
                } else {
                    $_SESSION['status'] = 'error';
                    $_SESSION['msg'] = 'An error has happened when the user wes registered';
                }

            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['msg'] = 'Complete all the fields in the register form!...';
            }

        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['msg'] = 'Something went wrong!...';
        }

        Utils::redirect(PUBLIC_URL . 'index.php?controller=User&action=register');

    }

    public function login()
    {
        if ( isset($_POST) ) {
            $user = new User(null, null, null, null, null);
            $user = $user->login($_POST['email'], $_POST['password']);

            if ( $user && is_object($user) ) {
                $_SESSION['user'] = $user;
                if ( $user->role == 'admin' ) {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['msg'] = 'incorrect credentials!...';
            }
        }

        Utils::redirect(PUBLIC_URL . 'index.php');
    }

    public function logout()
    {
        if ( isset( $_SESSION['user'] ) ) {
            unset( $_SESSION['user'] );
        }

        if ( isset( $_SESSION['admin'] ) ) {
            unset( $_SESSION['admin'] );
        }
        
        Utils::redirect(PUBLIC_URL . 'index.php');
    }
}