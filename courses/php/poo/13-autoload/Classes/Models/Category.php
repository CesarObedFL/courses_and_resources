<?php

namespace Models;

class Category {
    public $name;
    public $description;

    public function __construct()
    {
        $this->name = "Action";
        $this->description = "Category focused on reviews of action videogames";
    }

    public function __toString()
    {
        return $this->name . " : " . $this->description;
    }
    
}