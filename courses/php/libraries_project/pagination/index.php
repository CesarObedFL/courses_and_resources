<?php

require $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php//libraries_project/vendor/autoload.php';

$server = 'cyr_database_container';
$username = 'root'; // using root for user permissions
$password = 'secret';
$database = 'cyr_db';

$connection = new mysqli($server, $username, $password, $database);

$connection->query("SET NAMES 'utf8'");

// query to paginate
$result = $connection->query("SELECT COUNT(id) AS num_rows FROM Users");
$item_amount = $result->fetch_object()->num_rows;

// pagination object
$pagination = new Zebra_Pagination();

// number of items to paginate
$pagination->records($item_amount);

// number of items per page
$elements_per_page = 2;
$pagination->records_per_page($elements_per_page);

// pagination offset query
$page = $pagination->get_page();
$paginate_from = ($page - 1) * $elements_per_page;
$users = $connection->query("SELECT * FROM Users LIMIT $paginate_from, $elements_per_page");


// pagination
echo '<link rel="stylesheet" href="/courses_and_resources/courses/php/libraries_project/vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">';
while( $user = $users->fetch_object() ) {
    echo "<h1>{$user->name}</h1> <br>";
    echo "<h3>{$user->email}</h3> <hr>";
}

$pagination->render();

