<?php

if ( isset($_POST ) ) {

    require_once 'includes/database_connection.phps';
    session_start();

    // get the register's form variables
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : null;

    $errors = array();

    // validate data
    if ( !empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name) ) {
        $name_validated = true; 
    } else {
        $name_validated = false;
        $errors['name'] = "variable name invalid!...";
    }

    if ( !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $email_validated = true; 
    } else {
        $email_validated = false;
        $errors['email'] = "variable email invalid!...";
    }

    if ( !empty($password) ) {
        $password_validated = true; 
    } else {
        $password_validated = false;
        $errors['password'] = "variable password empty!...";
    }

    // dave data
    $save_data = false;
    if ( count($errors) == 0 ) {
        $save_data = true;
        $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        $sql = "INSERT INTO users VALUES(null, '$name', '$email', '$password', CURDATE());";
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

header('Location: index.php');