<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/blog_project/config/routes.php';

if ( isset($_SESSION['user'] ) && isset( $_GET['id'] ) ) {
    
    require_once INCLUDES_PATH.'/database_connection.php';

    $sql = "DELETE FROM articles WHERE id =". $_GET['id']." AND user_id = ".$_SESSION['user']['id'];
    mysqli_query($db, $sql);
}

header('Location: ../index.php');