<?php

require_once "classes.php";

$one_person = new Person();
$one_person->set_name('César');


$one_professional = new Professional("César", 1.77, 31, 'Engineer');

var_dump($one_person);

var_dump($one_professional);

