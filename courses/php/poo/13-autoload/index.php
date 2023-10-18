<?php

require_once 'autoload.php';

/* autoload */ /*
$user = new User();
$category = new Category();
$article = new Article();

echo $user . "<br>";
echo $category . "<br>";
echo $article . "<br>";
/* /. autoload */


/* namespaces */

use Models\User;
use Models\Category;
use Models\Article;

use Panel\User as UserAdmin;

class Main {
    public $user;
    public $category;
    public $article;

    public function __construct()
    {
        $this->user = new User();
        $this->category = new Category();
        $this->article = new Article();
    }
}



$main = new Main();
var_dump($main);

echo "<br><hr><br>";

$user = new UserAdmin();
var_dump($user);