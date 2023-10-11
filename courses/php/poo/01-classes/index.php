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

}
// /. class Car 

$one_car = new Car();

var_dump($one_car);