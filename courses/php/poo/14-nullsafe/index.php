<?php 


/**
 * En PHP 8, se introdujo el operador nullsafe (?->), que proporciona una forma más concisa y segura de acceder a propiedades y métodos de objetos cuando se trata con valores nulos.
 * 
 * Antes de PHP 8, si querías acceder a una propiedad o método de un objeto que podía ser nulo, necesitabas realizar una comprobación explícita para evitar errores si el objeto era nulo. 
 * El operador nullsafe simplifica este proceso.
 */

// Antes de PHP 8:
// Verificar si $obj no es nulo y luego acceder a la propiedad
if ($obj !== null) {
    $value = $obj->property;
} else {
    $value = null;
}


// Con PHP 8 y el operador nullsafe:
// Acceder a la propiedad con el operador nullsafe
$value = $obj?->property;

/**
 * El operador nullsafe realiza automáticamente la comprobación de nulidad y devuelve null si el objeto es nulo, evitando así la necesidad de 
 * escribir código adicional de comprobación de nulidad. Esto hace que el código sea más conciso y legible, especialmente cuando se trabaja con múltiples 
 * accesos a propiedades o métodos en cadena.
 */

 // Antes de PHP 8
$result = ($obj !== null) ? $obj->getNested()->getValue() : null;

// Con PHP 8 nullsafe
$result = $obj?->getNested()?->getValue();


