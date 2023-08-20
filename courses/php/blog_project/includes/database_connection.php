<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'blog_project_db';
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf-8'");