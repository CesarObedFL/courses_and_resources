<?php

/**
 * Las excepciones son eventos o situaciones excepcionales que ocurren durante la ejecución de un programa y que pueden interrumpir 
 * el flujo normal de la aplicación. 
 * 
 * Las excepciones se utilizan para manejar errores y situaciones excepcionales de manera controlada en una aplicación. 
 * En lugar de detener la ejecución del programa de manera abrupta, puedes "lanzar" una excepción cuando se produce un error.
 * 
 * Para lanzar una excepción, se utiliza la palabra clave throw. Puedes definir tus propias clases de excepción personalizadas o 
 * utilizar clases de excepción predefinidas, como Exception, para representar diferentes tipos de errores.
 * 
 * Para manejar excepciones, se utiliza la estructura try...catch. Esto permite que el código capture y maneje excepciones 
 * lanzadas en el bloque "try" en lugar de permitir que se propague el error y se detenga la ejecución.
 * 
 * El manejo de excepciones te permite controlar el flujo del programa y realizar acciones específicas en función del tipo de excepción que se ha lanzado.
 * PHP proporciona una jerarquía de clases de excepción que se utilizan para representar diferentes tipos de errores. Puedes capturar excepciones 
 * de clases derivadas antes de capturar excepciones de clases base, lo que te permite manejar errores de manera específica.
 * 
 * El manejo de excepciones también se utiliza para realizar tareas de limpieza, como cerrar archivos o conexiones a bases de datos, 
 * y para realizar acciones de recuperación en caso de errores.
 * 
 * En resumen, las excepciones en PHP son una forma de manejar errores y situaciones excepcionales de manera controlada, 
 * lo que permite que una aplicación continúe funcionando de manera más robusta y predecible.
 */

// try catch is used to catch errors in code susceptible to them
try {
    throw new Exception('Logic error!...');

} catch (Exception $e) {
    echo "there have been an error: " . $e->getMessage();

} finally {
    echo "ending the code block!...";
}