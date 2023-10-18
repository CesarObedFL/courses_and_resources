<?php

namespace Panel;

class User {
    public $name;
    public $email;

    public function __construct()
    {
        $this->name = "Lexie Valentine";
        $this->email = "lexie_valentine@gmail.com";
    }

    public function __toString()
    {
        return $this->name . " : " . $this->email;
    }
}