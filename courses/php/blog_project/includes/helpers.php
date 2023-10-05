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
 * function to get a single categorie of the database
 * 
 * @param Object with the database connection
 * @param Integer with the id of the category
 * @return Array with the categories obtained
 */
function get_category($db, $id)
{
    $sql = "SELECT * FROM categories WHERE id = $id";
    $result = mysqli_query($db, $sql);

    $category = null;
    if ( $result && mysqli_num_rows($result) >= 1 ) {
        $category = mysqli_fetch_assoc($result);
    }

    return $category;
}


/**
 * function to get the articles of the database
 * 
 * @param Object with the database connection
 * @return Array with 4 articles obtained of the database
 */
function get_articles($db, $amount = 0, $category_id = null)
{
    $LIMIT = ( $amount > 0 ) ? "LIMIT ".$amount : "";
    $WHERE_CATEGORY = ( $category_id ) ? "WHERE c.id = $category_id" : "";
    
    $sql = "SELECT a.*, c.name as category FROM articles a 
            INNER JOIN categories c ON a.category_id = c.id
            $WHERE_CATEGORY 
            ORDER BY a.id DESC " . $LIMIT;
    $result = mysqli_query($db, $sql);

    $articles = array();
    if ( $result && mysqli_num_rows($result) >= 1 ) {
        $articles = $result;
    } 

    return $articles;
}


/**
 * function to get a single article of the database
 * 
 * @param Object with the database connection
 * @param Integer with the id of the article
 * @return Array with the article obtained
 */
function get_article_by_id($db, $id)
{
    $sql = "SELECT a.*, c.name AS category, c.id AS category_id, u.name AS user_name, u.id AS user_id 
            FROM articles a 
                INNER JOIN categories c ON a.category_id = c.id 
                INNER JOIN users u ON a.user_id = u.id 
            WHERE a.id = $id";
    $result = mysqli_query($db, $sql);

    $article = null;
    if ( $result && mysqli_num_rows($result) >= 1 ) {
        $article = mysqli_fetch_assoc($result);
    }

    return $article;
}