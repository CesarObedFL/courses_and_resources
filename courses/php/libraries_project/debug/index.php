<?php

/**
 * firephp requires an google chrome extenssion to work called firephp4chrome
 */
require $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php//libraries_project/vendor/autoload.php';

$fruits = array("apples", "oranges", "bananas");
$names = array('Employee 1' => 'César', 'Employee 2' => 'Obed');

\FB::log($fruits);
\FB::log($names);


echo "Hello world!!!";

\FB::log("print in console");
