<?php

$server = 'cyr_database_container';
$username = 'cyr_db_user';
$password = 'secret';
$database = 'cyr_db';
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");