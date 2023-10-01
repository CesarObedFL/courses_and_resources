<?php

 require_once '../includes/database_connection.php';

 if (isset($_POST)) {

    // delete previous errors
    if ( isset($_SESSION['errors']['login']) ) {
        unset($_SESSION['errors']['login']);
    }

    // get form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if ( $login && mysqli_num_rows($login) == 1 ) {
        $user = mysqli_fetch_assoc($login);

        if (password_verify($password, $user['password']) ) {
            $_SESSION['user'] = $user;

        } else {
            $_SESSION['errors']['login'] = 'incorrect credentials...';
        }
    } else {
        $_SESSION['errors']['login'] = 'incorrect credentials...';
    }
}

header('Location: ../index.php');
