<?php

 require_once 'includes/database_connection.php';

 if (isset($_POST)) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if ( $login && mysqli_num_rows($login) == 1 ) {
        $user = mysqli_fetch_assoc($login);

        if (password_verify($password, $usuario['password']) ) {
            $_SESSION['user'] = $user;

            if ( isset($_SESSION['login_error']) ) {
                session_unset($_SESSION['login_error']);
            }
        } else {
            $_SESSION['login_error'] = 'incorrect credentials...';
        }
    } else {
        $_SESSION['login_error'] = 'incorrect credentials...';
    }
}

header('Location: index.php');
