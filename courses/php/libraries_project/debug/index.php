<?php

/**
 * firephp requires an google chrome extenssion to work called firephp for chrome (official)
 * and that extenssion need to be configured in chrome to work
 */

require $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php//libraries_project/vendor/autoload.php';

$fruits = array("apples", "oranges", "bananas");
$names = array('Employee 1' => 'César', 'Employee 2' => 'Obed');

\FB::log($fruits);
\FB::log($names);


\FB::log("print in console");


echo "Hello world!!!";