<?php

interface Computer {

    public function turn_on();
    public function turn_off();
    public function restart();
}

class Laptop implements Computer {
    private $model;

    public function get_model()
    {
        return $this->model;
    }

    public function set_model($model)
    {
        $this->model = $model;
    }

    public function turn_on()
    {
        return "turning on!...";
    }

    public function turn_off()
    {
        return "turning off!...";
    }

    public function restart()
    {
        return "Restarting!...";
    }
}


$laptop = new Laptop();

var_dump($laptop);