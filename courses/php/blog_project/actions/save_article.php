<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/blog_project/config/routes.php';

if ( isset($_POST) ) {

    require_once INCLUDES_PATH.'/database_connection.php';

    $title = isset( $_POST['title'] ) ? mysqli_real_escape_string($db, $_POST['title']) : false;
    $description = isset( $_POST['description'] ) ? mysqli_real_escape_string($db, $_POST['description']) : false;
    $category_id = isset( $_POST['category_id'] ) ? (int)$_POST['category_id'] : false;
    $user_id = $_SESSION['user']['id'];

    $errors = array();

    // validate data
    if ( !empty($title) ) {
        $name_validated = true; 
    } else {
        $name_validated = false;
        $errors['title'] = "variable title invalid!...";
    }

    // validate data
    if ( !empty($description) ) {
        $description_validated = true; 
    } else {
        $description_validated = false;
        $errors['description'] = "variable description invalid!...";
    }

    // validate data
    if ( !empty($category_id) && is_numeric($category_id) ) {
        $category_validated = true; 
    } else {
        $category_validated = false;
        $errors['category'] = "variable category invalid!...";
    }

    // save data
    if ( count($errors) == 0 ) {

        if ( isset($_GET['edit']) ) {
            $user_id = $_SESSION['user']['id'];
            $article_id = $_GET['edit'];
            $sql = "UPDATE articles 
                    SET title = '$title', description = '$description', category_id = $category_id 
                    WHERE id = $article_id AND user_id = $user_id";
        } else {
            $sql = "INSERT INTO articles VALUES(null, '$title', '$description', $user_id, $category_id, CURDATE());";
        }

        $result = mysqli_query($db, $sql);

        if ($result) {
            $_SESSION['saved'] = "Article saved successfully!...";
        } else {
            $_SESSION['errors']['saved'] = "Some error has happened until saving the article!...";
        }
        
        header('Location: ../index.php');

    } else {
        $_SESSION['errors'] = $errors;

        if ( isset($_GET['edit']) ) {
            header("Location: ../views/edit_articles.php?id=".$article_id);
        } else {
            header('Location: ../views/create_article.php');
        }
        
    }
}

