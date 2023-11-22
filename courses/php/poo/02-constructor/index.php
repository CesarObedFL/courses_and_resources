<?php

require_once 'Car.php';

$car_1 = new Car('Green', 'Tesla', 'X', 350, 350, 2, 2);
$car_2 = new Car('Black', 'Honda', 'Civic', 280, 280, 4, 5);
$car_3 = new Car('Grey', 'BMW', '', 250, 250, 4, 4);
$car_4 = new Car();


var_dump($car_1); echo '<br>';
var_dump($car_2); echo '<br>';
var_dump($car_3); echo '<br>';
var_dump($car_4);

echo $car_1->print($car_1);

