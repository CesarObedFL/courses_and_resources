<?php


class User {

    const URL = "http://localhost:8888";
    public $email;
    public $password;

    public function get_email()
    {
        return $this->email;
    }

    public function set_email($email)
    {
        $this->email = $email;
    }

}

$user = new User();
echo $user::URL . '<br>';

echo User::URL . '<br>';

var_dump($user);