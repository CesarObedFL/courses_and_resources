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
    if ($_SESSION['errors']) {
        $_SESSION['errors'] = null;
        session_unset($_SESSION['errors']);
    }
   
    if ($_SESSION['saved']) {
        $_SESSION['saved'] = null;
        session_unset($_SESSION['saved']);
    }
}