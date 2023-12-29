<?php

/**
 * En PHP 8, se introdujeron los "Union Types" (tipos de unión), que permiten especificar que una variable o retorno de una 
 * función puede tener uno de varios tipos diferentes. 
 * Esto mejora la precisión y claridad del código al indicar explícitamente los tipos que una variable o función puede manejar.
 * Antes, si una variable o función podía aceptar más de un tipo, se solía documentar esa información en los comentarios o en la documentación, 
 * pero no había una manera de hacerlo directamente en la firma del código.
 */
// Ejemplo en PHP clásico:

class Employee1 { 

    private $age; 

    /** 
     * @param int|float $salary
     * @return int|float annual salary 
     */ 
    public function get_annual_salary(int $salary): int { 
        return $salary * 12; 
    }
}


// Ejemplo en PHP 8:

class Employee { 

    private int $age; 

    public function get_annual_salary(int|float $salary): int|float { 
        return $salary * 12;
    }
}

echo 'Employe salary 100, annual salary: ' . (new Employee)->get_annual_salary(100) . "<br>";
echo 'Employe salary 85.5, annual salary: ' . (new Employee)->get_annual_salary(85.5) . "<br>";

/**
 * La sintaxis de Union Types utiliza el operador de tubería | para indicar la unión entre tipos.
 * Los tipos se evalúan de izquierda a derecha, y el resultado es el primer tipo válido.
 * Puedes combinar Union Types con el tipo null para indicar que una variable o función puede aceptar un tipo específico o null. Por ejemplo, int|null indica que la variable puede ser un entero o nula.
 */

function get_string_length(?string $string): int|null {
    return $string !== null ? strlen($string) : null;
}


echo "length of cesar: " . get_string_length("cesar") . "<br>";
echo "length of null: " . get_string_length(null) . "<br>";

/**
 * Los Union Types pueden utilizarse con clases, interfaces y tipos primitivos, proporcionando una mayor flexibilidad en la declaración de tipos.
 */

 class Animal {
    public $name = 'animal';
    //...
 }
 class Dog extends Animal {
    public $name = 'dog';
    //...
 }
 
 function get_name(Animal|Dog $animal): string {
     return $animal->name;
 }

 echo get_name((new Animal)) . '<br>';
 echo get_name((new Dog)) . '<br>';


 /**
  * En resumen, los Union Types en PHP 8 permiten expresar de manera clara y concisa que una variable o función puede aceptar varios tipos diferentes, 
  * mejorando la legibilidad y la precisión del código. Esto facilita la comprensión del comportamiento esperado y ayuda en la detección temprana de posibles errores. 
  */
