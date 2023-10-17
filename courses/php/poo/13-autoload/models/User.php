<?php


class User {
    public $name;
    public $email;

    public function __construct()
    {
        $this->name = "César Obed Figueroa Luna";
        $this->email = "cesarobedfl@gmail.com";
    }

    public function __toString()
    {
        return $this->name . " : " . $this->email;
    }
}