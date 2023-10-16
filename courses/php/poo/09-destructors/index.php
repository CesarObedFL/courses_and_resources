<?php

class User {
    public $name;
    public $email;

    public function __construct()
    {
        $this->name = "Cesar Obed";
        $this->email = "cesarobedfl@gmail.com";
        echo "creating the object!...";
    }

    public function __destruct()
    {
        $this->name = "";
        $this->email = "";
        echo 'destroying the object!...';
    }
}


$user = new User();