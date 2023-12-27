<?php

/**
 * En PHP 8, se introdujo la capacidad de pasar parámetros a funciones y métodos mediante sus nombres, lo que se conoce como "parámetros con nombre" o "named parameters". 
 * Antes de PHP 8, los argumentos se pasaban de manera posicional, lo que a veces podía hacer que el código fuera menos claro y más propenso a errores 
 * cuando se trabajaba con funciones que tenían varios parámetros.
 * Con los parámetros con nombre, puedes especificar explícitamente a qué parámetro estás proporcionando un valor, lo que hace que el código sea más legible y 
 * reduce la dependencia del orden de los argumentos.
 */

function show_welcome_message($course, $professor, $hours){
    return "Welcome to $course, imparted by $professor, that contains $hours hours of contain!..." . "<br>";
}

// antes de PHP 8, parámetros de forma secuencial

echo show_welcome_message('PHP Master', 'Víctor Robles', 56);



// Con PHP 8 - Parámetros con nombre

echo show_welcome_message(
    hours: 56,
    course: 'PHP Master',
    professor: 'Víctor Robles'
);


/**
 * En el ejemplo de PHP 8, los parámetros se pasan utilizando la sintaxis nombre: valor. 
 * Esto hace que sea más fácil entender qué valor se está proporcionando para cada parámetro, incluso si cambia el orden de los parámetros.
 * Beneficios de los parámetros con nombre:
 *  - Legibilidad del código: Los parámetros con nombre hacen que el código sea más claro y fácil de entender, especialmente cuando una función tiene muchos parámetros opcionales.
 *  - Flexibilidad: Puedes proporcionar solo los valores para los parámetros que necesitas, sin preocuparte por el orden. Esto es útil cuando hay muchos parámetros opcionales.
 *  - Menos propenso a errores: Al especificar explícitamente a qué parámetro estás asignando un valor, reduces la posibilidad de cometer errores relacionados con el orden de los argumentos.
 * 
 * Es importante tener en cuenta que puedes combinar parámetros con nombre y parámetros posicionales en la misma llamada a función. 
 * Sin embargo, los parámetros con nombre deben venir después de los parámetros posicionales. Además, si utilizas parámetros con nombre, 
 * todos los parámetros que sigan deben también usar la sintaxis de parámetros con nombre.
 */




