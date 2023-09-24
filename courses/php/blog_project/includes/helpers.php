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

function get_categories($db)
{
    $sql = "SELECT * FROM categories ORDER BY id ASC";
    $result = mysqli_query($db, $sql);

    $categories = array();
    if ( $result && mysqli_num_rows($result) >= 1 ) {
        $categories = $result;
    }

    return $categories;
}