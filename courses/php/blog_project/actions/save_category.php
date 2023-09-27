<?php

if ( isset($_POST) ) {
    require_once '../includes/database_connection.php';

    $name = isset( $_POST['name'] ) ? mysqli_real_escape_string($db, $_POST['name']) : false;

    $errors = array();

    // validate data
    if ( !empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name) ) {
        $name_validated = true; 
    } else {
        $name_validated = false;
        $errors['name'] = "variable name invalid!...";
    }

    // save data
    if ( count($errors) == 0 ) {
        $sql = "INSERT INTO categories VALUES(null, '$name', CURDATE());";
        $result = mysqli_query($db, $sql);

        if ($result) {
            $_SESSION['saved'] = "User saved successfully!...";
        } else {
            $_SESSION['errors']['saved'] = "Some error has happened until saving user!...";
        }


    } else {
        $_SESSION['errors'] = $errors;
        
    }
}

header('Location: ../index.php');