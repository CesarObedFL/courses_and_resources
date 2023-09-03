<?php

function show_errors($errors, $field)
{
    $alert = '';
    if ( isset($errors[$field]) && !empty($field) ) {
        $alert = "<div class='alert alert-error'>" . $errors[$field] . "</div>";
    } 

    return $alert; 
}


function clean_errors() 
{
    $_SESSION['errors'] = null;
    return session_unset($_SESSION['errors']);
}