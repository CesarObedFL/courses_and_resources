<?php

/**
 * Los destructores en son métodos especiales que se utilizan para realizar acciones específicas antes de que un objeto de una clase 
 * sea destruido o liberado de la memoria. Son útiles cuando una clase necesita liberar recursos, como cerrar archivos, 
 * conexiones a bases de datos o realizar otras tareas de limpieza antes de que un objeto sea destruido.
 * 
 * No necesitas llamar explícitamente el destructor. Se ejecuta automáticamente cuando un objeto se destruye o cae fuera del ámbito.
 * 
 * A diferencia de los constructores, los destructores no aceptan parámetros ni argumentos. Su función principal es realizar acciones de limpieza.
 * 
 * En resumen, los destructores son métodos especiales que se utilizan para garantizar una limpieza adecuada y la liberación de recursos 
 * antes de que un objeto sea destruido. Son útiles para asegurarse de que los objetos se manejen correctamente durante el ciclo de vida de una aplicación.
 */

class User {
    public $name;
    public $email;

    public function __construct()
    {
        $this->name = "Cesar Obed";
        $this->email = "cesarobedfl@gmail.com";
        echo "creating the object!...";
    }

    public function __destruct()
    {
        $this->name = "";
        $this->email = "";
        echo 'destroying the object!...';
    }
}


$user = new User();