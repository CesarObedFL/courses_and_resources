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


echo "<br><hr><h1>Búsqueda de Clases</h1><br>";

// búsqueda de clases
/**
 * El símbolo @ en PHP se utiliza para silenciar los errores y advertencias que pueden generarse al ejecutar una función o expresión. 
 * Cuando se coloca @ delante de una función o expresión, PHP no mostrará ningún mensaje de error o advertencia que se genere 
 * durante la ejecución de esa función o expresión. 
 * En otras palabras, suprime la notificación de errores.
 * 
 * Esto puede ser útil en situaciones en las que se espera que una función genere errores, pero no se desean mostrar en la salida 
 * al usuario o en los registros del servidor. Sin embargo, el uso excesivo de @ para suprimir errores no se recomienda, 
 * ya que puede hacer que sea difícil depurar problemas en el código y ocultar problemas subyacentes.
 */

 if ( @class_exists('User') ) {
    echo "<h2>class User exist!...</h2>";
} else {
    echo "<h2>class User don't exist!...</h2>";
}

if ( @class_exists('Models\User') ) {
    echo "<h2>class Models\User exist!...</h2>";
} else {
    echo "<h2>class Models\User don't exist!...</h2>";
}

echo "<br><hr><h1>Búsqueda de Métodos</h1><br>";

// búsqueda de métodos de clase

var_dump(get_class_methods($user));

$methods = get_class_methods($user);
$search_method = array_search('set_name', $methods);

if ( $search_method ) {
    echo "<h2>method set_name exist on: " . $search_method . "</h2><br>";
} else {
    echo "<h2>method set_name don't exist!...</h2><br>";
}

$search_method = array_search('__call', $methods);

if ( $search_method ) {
    echo "<h2>method __call exist on: " . $search_method . " position</h2><br>";
} else {
    echo "<h2>method __call don't exist!...</h2><br>";
}

