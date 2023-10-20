<?php

/**
 * La función "autoload" en PHP es una característica que permite la carga automática de clases cuando se intenta utilizar una 
 * clase que aún no ha sido incluida en el script. 
 * El autoload es una técnica que permite cargar clases de forma dinámica y automática en tiempo de ejecución, a medida que se necesitan, 
 * en lugar de cargar todas las clases al principio del script. Elimina la Necesidad de Include/Require; Con el autoload, ya no es necesario 
 * utilizar include o require para incluir archivos de clases manualmente en tu script. El sistema de autoload se encarga de ello por ti.
 * 
 * Puedes implementar tu propio mecanismo de autoload mediante funciones definidas por el usuario o utilizando funciones integradas como spl_autoload_register(). 
 * Esto permite definir reglas personalizadas para la carga de clases.
 * 
 * PSR-4 y PSR-0: Las especificaciones de PSR-4 y PSR-0 son estándares ampliamente aceptados en la comunidad PHP que definen convenciones 
 * para la estructura de directorios y la carga automática de clases. Esto hace que el autoload sea consistente en diferentes proyectos y bibliotecas.
 * 
 * El autoload evita cargar todas las clases en memoria, lo que puede optimizar el uso de recursos y mejorar el rendimiento de una aplicación.
 * 
 * El autoload también se utiliza para manejar espacios de nombres (namespaces) y sus clases correspondientes.
 * 
 * El autoload es una característica poderosa que facilita la gestión de clases en aplicaciones PHP, permitiendo una carga más eficiente y organizada de clases.
 */

define('BASE_PATH', realpath(dirname(__FILE__)));

function app_autoloader($class)
{
    // Adapt this depending on your directory structure
    $filename = BASE_PATH . '/Classes/'. str_replace('\\', '/', $class) . '.php';
    include($filename);
}


spl_autoload_register('app_autoloader');