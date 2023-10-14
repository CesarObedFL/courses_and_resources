<?php

class User {
    public $name;
    public $email;

    public function __construct()
    {
        $this->name = "Cesar Obed";
        $this->email = "cesarobedfl@gmail.com";
    }

    public function __desctruct()
    {
        $this->name = "";
        $this->email = "";
    }
}


$user = new User();