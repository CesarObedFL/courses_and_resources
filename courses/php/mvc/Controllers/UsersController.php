<?php


class UsersController {

    public function create()
    {
        require_once '../Views/Users/create.php';
    }

    public function show()
    {
        require_once 'Models/User.php';
        
        $user = new User();

        $users = $user->get_all_users();

        require_once '../Views/Users/show.php';
    }

}