<?php

/**
 * Estas líneas de código en PHP se utilizan para configurar y controlar cómo se manejan y se muestran los errores en tiempo de ejecución. 
 * 
 * ini_set('display_errors', '1'); Esta línea configura la directiva display_errors en el archivo de configuración de PHP (php.ini) 
 * para mostrar los errores en el navegador durante el tiempo de ejecución. El valor '1' indica que se deben mostrar los errores. 
 * Si se estableciera en '0', los errores no se mostrarían en el navegador.
 * 
 * ini_set('display_startup_errors', '1'); Similar a la línea anterior, esta configura la directiva display_startup_errors para mostrar 
 * los errores durante la inicialización del script (inicio de ejecución). El valor '1' indica que se deben mostrar los errores durante la inicialización.
 * 
 * error_reporting(E_ALL); Esta línea establece el nivel de reporte de errores mediante la función error_reporting(). En este caso, se configura 
 * para informar todos los tipos de errores (E_ALL). Esto incluye advertencias, notificaciones y errores fatales. Puedes ajustar el valor pasado a error_reporting() 
 * para limitar o ampliar el conjunto de errores que deseas manejar.
 * 
 * Estas configuraciones son útiles durante el desarrollo y la depuración de aplicaciones, ya que te permiten ver y corregir los errores 
 * de manera más efectiva. Sin embargo, en un entorno de producción, es común desactivar la visualización de errores en el navegador y registrarlos en archivos 
 * de registro para evitar exponer detalles internos de la aplicación a los usuarios finales.
 */

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/**
 * Sin embargo, esto no hace que PHP muestre errores de análisis ocurridos en el mismo archivo. Además, PHP puede anular estas configuraciones.
 * En estos casos la única manera de mostrar esos errores es modificar tu php.ini (o php-fpm.conf) con esta línea:
 */

display_errors = on

/**
 * Si no se tiene acceso al archivo php.ini, entonces poner en el archivo .htaccess la siguiente linea serviria:
 */

php_flag display_errors 1 


