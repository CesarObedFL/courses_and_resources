<?php

if ( isset($_POST['submit']) ) {

    // get the register's form variables
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

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

    // 
    if ( count($errors) == 0 ) {
        echo "insert data";
    } else {
        echo "cannot insert data";
    }
}