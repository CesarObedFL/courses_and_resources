<?php


class UsersController {

    public function create()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/mvc/Views/Users/create.php';
    }

    public function show()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/mvc/Models/User.php';
        
        $user = new User();

        $users = $user->get_all_users();

        require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/mvc/Views/Users/show.php';
    }

}