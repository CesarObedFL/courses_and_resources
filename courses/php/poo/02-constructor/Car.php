<?php

class Car {

    // attributes
    public $color;
    public $brand;
    public $model;
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