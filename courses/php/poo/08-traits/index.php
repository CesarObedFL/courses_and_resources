<?php

trait Utils {
    public function get_name()
    {
        return $this->name;
    }
}

class Car {

    use Utils;

    public $name;
    public $brand;

    public function __construct()
    {
        $this->name = "Jetta";
        $this->brand = "VW";
    }
}

class Person {

    use Utils;

    public $name;
    public $age;

    public function __construct()
    {
        $this->name = "Cesar";
        $this->age = 31;
    }
}

class Videogame {
    
    use Utils;

    public $name;
    public $console;

    public function __construct()
    {
        $this->name = "The Legend of Zelda";
        $this->console = "Nintendo";
    }
}


$one_car = new Car();
$one_person = new Person();
$one_videogame = new Videogame();

echo $one_car->get_name() . "<br>";
echo $one_person->get_name() . "<br>";
echo $one_person->get_name() . "<br>";