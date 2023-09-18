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
    if ( isset($_SESSION['errors']) ) {
        //$_SESSION['errors'] = null;
        unset($_SESSION['errors']);
    }
   
    if ( isset($_SESSION['saved']) ) {
        //$_SESSION['saved'] = null;
        unset($_SESSION['saved']);
    }
}