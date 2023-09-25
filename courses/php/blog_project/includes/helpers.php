<?php

/**
 * function to show the errors in the text field in the frontend
 * 
 * @param Array with the errors in the text field
 * @param String with the field's name to show
 * @return Html element with the error string
 */
function show_errors($errors, $field)
{
    $alert = '';
    if ( isset($errors[$field]) && !empty($field) ) {
        $alert = "<div class='alert alert-error'>" . $errors[$field] . "</div>";
    } 

    return $alert; 
}

/**
 * function to clean the array errors and messages
 */
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


/**
 * function to get all the categories of the database
 * 
 * @param Object with the database connection
 * @return Array with the categories obtained
 */
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


/**
 * function to get the articles of the database
 * 
 * @param Object with the database connection
 * @return Array with 4 articles obtained of the database
 */
function get_articles($db)
{
    $sql = "SELECT a.*, c.name as category FROM articles a 
            INNER JOIN categories c ON a.category_id = c.id
            ORDER BY a.id DESC LIMIT 4";
    $result = mysqli_query($db, $sql);

    $articles = array();
    if ( $result && mysqli_num_rows($result) >= 1 ) {
        $articles = $result;
    } 

    return $articles;
}