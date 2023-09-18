<?php

$server = 'cyr_database_container';
$username = 'root'; // using root for user permissions
$password = 'secret';
$database = 'blob_project_db';
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

session_start();