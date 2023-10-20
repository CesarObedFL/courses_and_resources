<?php

/**
 * La herencia es un concepto clave en la POO. Permite crear nuevas clases basadas en clases existentes. 
 * Una clase derivada (subclase o hija) hereda propiedades y métodos de una clase base (superclase o padre) 
 * y puede agregar nuevos o modificar los existentes.
 */

class Person {

    public $name;
    public $height;
    public $age;

    public function __construct($name = null, $height = null, $age = null)
    {
        $this->name = $name;
        $this->height = $height;
        $this->age = $age;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_height()
    {
        return $this->height;
    }

    public function set_height($height)
    {
        $this->height = $height;
    }

    public function get_age()
    {
        return $this->age;
    }

    public function set_age($age)
    {
        $this->age = $age;
    }

    public function speak() 
    {
        return "Speaking!...";
    }

    public function walk()
    {
        return "Walking!...";
    }

}


class Professional extends Person {

    public $career;

    public function __construct($name = null, $height = null, $age = null, $career = null)
    {
        parent::__construct($name, $height, $age);
        $this->career = $career;
    }

    public function set_career($career)
    {
        $this->career = $career;
    } 

    public function get_career()
    {
        return $this->career;
    }

    public function programming()
    {
        return "I'm programming!...";
    }

    public function fix_computer()
    {
        return "Fixing computers!...";
    }
}