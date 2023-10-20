<?php

/**
 * Los constructores en PHP son métodos especiales dentro de una clase que se ejecutan automáticamente cuando se crea una 
 * instancia (objeto) de esa clase. Aquí tienes una breve descripción de los constructores en PHP: 
 * Se utilizan para inicializar objetos cuando se crea una instancia de una clase. Esto significa que puedes realizar 
 * tareas de configuración o asignar valores iniciales a propiedades dentro del constructor. 
 * 
 * No necesitas llamar explícitamente el constructor cuando creas un objeto. Se llama automáticamente en el momento de la creación del objeto.
 * Puedes definir parámetros en el constructor para pasar valores iniciales a la clase cuando se crea una instancia,
 * esto permite una mayor flexibilidad al configurar objetos. 
 * 
 * Los constructores son útiles para establecer valores iniciales en propiedades de la clase o para realizar tareas de configuración 
 * que deben llevarse a cabo al principio de la vida del objeto.
 */

class Car {

    // attributes
    public $color;
    protected $brand;
    private $model;
    public $speed;
    public $potency;
    public $doors;
    public $places;

    public function __construct($color = null, $brand = null, $model = null, $speed = null, $potency = null, $doors = null, $places = null)
    {
        $this->color = isset($color) ? $color : 'rojo'; 
        $this->brand = isset($brand) ? $brand : 'VW';
        $this->model = isset($model) ? $model : 'Jetta';
        $this->speed = isset($speed) ? $speed : 200;
        $this->potency = isset($potency) ? $potency : 200;
        $this->doors = isset($doors) ? $doors : 4;
        $this->places = isset($places) ? $places : 5;
    }

    // methods
    public function get_color()
    {
        return $this->color;
    }

    public function set_color($color)
    {
        $this->color = $color;
    }

    public function set_brand($brand)
    {
        $this->brand = $brand;
    }

    public function set_model($model)
    {
        $this->model = $model;
    }

    public function get_model()
    {
        return $this->model;
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

    public function print(Car $object)
    {
        $info = "<h1>Car info</h1><br>";
        $info .= "Color:".$object->color."<br>";
        $info .= "Speed:".$object->speed."<br>";
        $info .= "Potency:".$object->potency."<br>";

        return $info;
    }

}
// /. class Car 