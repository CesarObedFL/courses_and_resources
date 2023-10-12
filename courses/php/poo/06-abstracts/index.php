<?php

abstract class Computer {

    public $state;

    abstract public function turn_on();

    public function turn_off()
    {
        $this->state = "off";
    }
}


class Laptop extends Computer {

    public $software;

    public function turn_on() {
        $this->state = 'on';
    }

    public function run_software()
    {
        $this->software = true;
    }

}

$laptop = new Laptop();
$laptop->turn_on();
$laptop->run_software();
var_dump($laptop);
$laptop->turn_off();
var_dump($laptop);

