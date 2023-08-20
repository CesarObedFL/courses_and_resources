<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'blog_project_db';
$db = mysql_connect($server, $username, $password, $database);

mysql_query($db, "SET NAMES 'utf-8'");