<?php

/**
 * Cuando definimos una propiedad en PHP, teníamos que repetirla hasta 3 veces para usarla como 
 * pametros de un objeto. Ahora PHP 8, incluye csta nueva característica que nos permite reducir 
 * mucho la cantidad de código que escribimos.
 */

// Ejemplo en PHP clásico:

class Person
{
    public $name;
    public $email;
    public $age;

    public function __construct(
    $name,
    $email,
    $age
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }
}

// Ejemplo en PHP 8:

class Person
{
    public function __construct(
        $name,
        $email,
        $age
    ) {}
}

 