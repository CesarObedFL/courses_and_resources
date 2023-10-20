<?php

/**
 * Los traits son una característica de la poo que permiten la reutilización de código en clases de manera más flexible. 
 * 
 * Proporcionan una forma de reutilizar código en varias clases sin la necesidad de herencia. Puedes definir un conjunto de métodos en un trait 
 * y luego usar ese trait en múltiples clases.
 * 
 * A diferencia de la herencia, que implica una relación jerárquica, los traits permiten una composición de comportamiento. 
 * Puedes incluir varios traits en una sola clase, lo que proporciona una mayor flexibilidad al combinar funcionalidades.
 * Cuando una clase utiliza varios traits que tienen métodos con el mismo nombre, PHP proporciona reglas para resolver los conflictos: puedes 
 * especificar explícitamente cuál método debería usarse en la clase que usa los traits.
 * 
 * Una clase puede usar múltiples traits, lo que significa que puedes agregar funcionalidades de diferentes fuentes a una sola clase 
 * sin heredar de varias clases diferentes.
 * 
 * Los traits facilitan la organización del código y la mantenibilidad al permitir que las funcionalidades se agrupen lógicamente en traits específicos. 
 * Esto hace que el código sea más modular y fácil de entender.
 * 
 * No pueden ser instanciados por sí mismos. Se utilizan solo para proporcionar métodos y propiedades a clases que los utilizan.
 * Puedes usar traits para agregar funcionalidades a una clase base y, si es necesario, crear clases derivadas que agreguen o modifiquen aún más el comportamiento.
 * 
 * En resumen, los traits en PHP son una herramienta poderosa para la reutilización de código y la composición flexible de clases. 
 * Permiten organizar y agregar funcionalidades a las clases de manera modular, lo que mejora la estructura y mantenibilidad del código.
 */

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
echo $one_videogame->get_name() . "<br>";