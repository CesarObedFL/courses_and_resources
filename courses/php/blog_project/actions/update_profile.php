<?php

if ( isset($_POST ) ) {

    require_once '../includes/database_connection.php';

    // get the register's form variables
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;

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

    // /. validate data 

    // save data
    $save_data = false;
    if ( count($errors) == 0 ) {
        $save_data = true;
        $user = $_SESSION['user'];

        $sql = "SELECT id, email FROM users WHERE email = '$email'";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);

        if ( $isset_user['id'] == $user['id'] || empty($isset_user) ) {

            
            $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = " . $user['id'];
            $result = mysqli_query($db, $sql);

            if ($result) {
                $_SESSION['user']['name'] = $name;
                $_SESSION['user']['email'] = $email;
                $_SESSION['saved'] = "User updated successfully!...";
            } else {
                $_SESSION['errors']['saved'] = "Some error has happened until updating user!...";
            }

        } else {
            $_SESSION['errors']['saved'] = "email used already, you can't update it!...";
        }

    } else {
        $_SESSION['errors'] = $errors;

    }
}

header('Location: ../views/profile.php');

