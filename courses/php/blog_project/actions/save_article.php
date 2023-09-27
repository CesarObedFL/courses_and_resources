<?php

if ( isset($_POST) ) {
    require_once '../includes/database_connection.php';

    $name = isset( $_POST['name'] ) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $description = isset( $_POST['description'] ) ? mysqli_real_escape_string($db, $_POST['description']) : false;
    $category_id = isset( $_POST['category_id'] ) ? (int)$_POST['category_id'] : false;
    $user_id = $_SESSION['user']['id'];

    $errors = array();

    // validate data
    if ( !empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name) ) {
        $name_validated = true; 
    } else {
        $name_validated = false;
        $errors['name'] = "variable name invalid!...";
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
        $sql = "INSERT INTO articles VALUES(null, '$name', '$description', $user_id, $category_id, CURDATE());";
        $result = mysqli_query($db, $sql);

        if ($result) {
            $_SESSION['saved'] = "Article saved successfully!...";
        } else {
            $_SESSION['errors']['saved'] = "Some error has happened until saving the article!...";
        }


    } else {
        $_SESSION['errors'] = $errors;
        
    }
}

header('Location: index.php');