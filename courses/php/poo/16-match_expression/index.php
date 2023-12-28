<?php

/**
 * En PHP 8, se introdujo una nueva estructura de control llamada match, que se utiliza para realizar comparaciones más expresivas y 
 * concisas que la instrucción switch. La expresión match permite evaluar una expresión y comparar su valor con una serie de patrones, 
 * devolviendo el resultado de la primera coincidencia.
 * 
 * Las comparaciones en match son estrictas, lo que significa que también se compara el tipo de los valores. Esto evita conversiones automáticas de tipo.
 */

$genre_id = $_GET["genre_id"];
 
$genre = match ($genre_id) {
    '1' => 'Man',
    '2' => 'Woman',
    default => 'Other'
};
 
echo 'genre: ' . $genre . '<br>';



/**
 * Puedes utilizar expresiones más complejas en los patrones, incluyendo expresiones regulares, llamadas a funciones, etc.
 * 
 * NO FUNCIONA EN PRUEBAS HECHAS
 */

$value = 'string';

//echo ":" . is_string('string1') . "<br>";
//echo ":" . preg_match('/\d+/', 'string1') . "<br>";

$result = match ($value) {
    is_string($value) => 'It is a string',
    preg_match('/\d+/', $value) => 'Contain numbers',
    default => 'No Coincidence',
};

echo "string: " . $result . "<br>";

/**
 * Puedes combinar match con la desestructuración de arrays y objetos para realizar comparaciones más complejas.
 * 
 * NO FUNCIONA EN PREUBAS HECHAS
 */

$data = [ 'option2', 1000 ];

$result = match ($data) {
    ['option1', $value] => "Option 1 with value $value",
    ['option2', $value] => "Option 2 with value $value",
    default => 'No Coincidence',
};

echo "data: " . $result . "<br>";

/**
 * match también puede utilizarse como expresión, lo que significa que puedes asignar el resultado directamente a una variable o devolverlo desde una función.
 */

function get_result($value) {
    return match ($value) {
        1 => 'Result 1',
        2 => 'Result 2',
        default => 'Default Result',
    };
}

echo get_result(1) . "<br>";
echo get_result(2) . "<br>";
echo get_result(10) . "<br>";
