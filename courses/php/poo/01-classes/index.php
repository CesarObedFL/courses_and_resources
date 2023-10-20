<?php

/**
 * Clases: Una clase es una plantilla o un modelo que define la estructura y el comportamiento de 
 * los objetos que se crearán a partir de ella. 
 * Las clases contienen propiedades (variables) y métodos (funciones) que encapsulan el comportamiento de los objetos.
 * 
 * Objetos: Los objetos son instancias de una clase. Cuando se crea un objeto a partir de una clase, 
 * hereda las propiedades y métodos definidos en esa clase. 
 * Cada objeto puede tener sus propios valores para las propiedades, pero comparte los mismos métodos.
 */


class Car {

    // attributes
    public $color = 'rojo';
    public $brand = 'VW';
    public $model = 'Jetta';
    public $speed = 200;
    public $potency = 200;
    public $doors = 4;
    public $places = 5;

    /**
     * Encapsulación: Las clases permiten la encapsulación, lo que significa que puedes ocultar la implementación interna de una clase y exponer solo la interfaz pública. Esto ayuda a organizar y mantener el código y a prevenir el acceso no autorizado a las propiedades o métodos internos.
     */
    // methods
    public function get_color()
    {
        return $this->color;
    }

    public function set_color($color)
    {
        $this->color = $color;
    }

    public function set_model($model)
    {
        $this->model = $model;
    }

    public function get_speed()
    {
        return $this->speed;
    }

    public function acelerate()
    {
        $this->speed++;
    }

    public function slow_down()
    {
        $this->speed--;
    }

    // system constants
    public function system_constants()
    {
        return 'class constant: ' . __CLASS__ . ' <br> ' .
                'method constant: ' . __METHOD__ . '<br>' . 
                'dir constant: ' . __DIR__ . ' <br> ' .
                'file constant: ' . __FILE__ . ' <br> ' .
                'namespace constant: ' . __NAMESPACE__ . ' <br> ';
    }

}
// /. class Car 

$one_car = new Car();

var_dump($one_car);

echo "<br><br>";

echo $one_car->system_constants() . '<br>';

/**
 * En resumen, las clases en PHP son la base de la programación orientada a objetos y proporcionan una forma estructurada 
 * y eficaz de organizar y reutilizar el código. 
 * Se utilizan para modelar objetos del mundo real y abstraer su comportamiento y propiedades en un entorno de programación.
 */