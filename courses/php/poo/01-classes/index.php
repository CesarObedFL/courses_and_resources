<?php

class Car {

    // attributes
    public $color = 'rojo';
    public $brand = 'VW';
    public $model = 'Jetta';
    public $speed = 200;
    public $potency = 200;
    public $doors = 4;
    public $places = 5;

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