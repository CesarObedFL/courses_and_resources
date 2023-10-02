<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/blog_project/config/routes.php';

if ( !isset($_SESSION) ) {
    session_start();
}

if ( !isset( $_SESSION['user'] ) ) {
    header("Location: ". DIR_PATH."/index.php");
}