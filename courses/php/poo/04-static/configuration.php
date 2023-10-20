<?php

/**
 * Las variables estáticas son variables que pertenecen a la clase en lugar de a una instancia particular de esa clase. 
 * Se declaran dentro de una clase pero no están vinculadas a instancias individuales de la clase. En cambio, pertenecen a la clase en sí. 
 * Son compartidas entre todas las instancias (objetos) de la clase. Esto significa que, si modificas el valor de una variable estática 
 * en una instancia, ese cambio se reflejará en todas las demás instancias de la clase.
 * Son útiles para almacenar datos que deben ser compartidos y persistir a lo largo del ciclo de vida de la aplicación, 
 * pero que no están directamente relacionados con una instancia específica.
 * Para acceder a una variable estática, no necesitas crear una instancia de la clase, sino puedes acceder a ella directamente a través 
 * del nombre de la clase utilizando Clase::nombreVariable o, dentro de la clase, usando self::$nombreVariable.
 * A diferencia de las variables de instancia, las variables estáticas no requieren que se cree una instancia de la clase para acceder a ellas.
 * Se utilizan en una variedad de situaciones, como para contadores globales, almacenamiento de configuraciones globales y caché de datos compartidos.
 */

class Configuration {

    public static $color;
    public static $environtment;

    public static function get_color()
    {
        return self::$color;
    }

    public static function set_color($color)
    {
        self::$color = $color;
    }

    public static function get_environtment()
    {
        return self::$environtment;
    }

    public static function set_environtment($environtment)
    {
        self::$environtment = $environtment;
    }

}