<?php

class User {
    public $name;
    public $email;
    public $password;

    public function __construct($name, $email, $password)
    {
        $this->name = (isset($name)) ? $name : 'Cesar Obed Figueroa Luna';
        $this->email = (isset($email)) ? $email : 'cesarobedfl@gmail.com';
        $this->password = (isset($password)) ? $password : 'secret';
    }

    // getters and setters
    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function set_email($email)
    {
        $this->email = $email;
    }

    public function get_email()
    {
        return $this->email;
    }

    public function set_password($password)
    {
        $this->password = $password;
    }


    // database functions 
    public function get_all_users()
    {
        return 'all users';
    }

}