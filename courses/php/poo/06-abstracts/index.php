<?php

/**
 * Una clase abstracta es una clase que no se puede instanciar directamente y que sirve como plantilla para otras clases. 
 * No puede ser utilizada para crear objetos directamente. Su principal propósito es proporcionar una estructura y definir 
 * un conjunto de métodos que deben ser implementados por las clases hijas. 
 * 
 * Suele contener al menos un método abstracto. Los métodos abstractos son declaraciones de métodos que no tienen cuerpo 
 * y están destinados a ser implementados por las clases hijas. Cada clase hija que hereda de la clase abstracta 
 * debe proporcionar una implementación concreta de estos métodos. 
 * 
 * Las clases que heredan de una clase abstracta están obligadas a implementar todos los métodos abstractos definidos en la clase abstracta. 
 * Si una clase hija no implementa alguno de estos métodos, se generará un error en tiempo de ejecución. 
 * 
 * Las clases abstractas se utilizan para definir una interfaz común o un conjunto de comportamientos que deben estar disponibles en las clases hijas. 
 * Esto asegura que las clases hijas cumplan con ciertos requisitos y mantengan una estructura coherente.
 * 
 * Pueden incluir propiedades y métodos concretos además de los métodos abstractos. Esto permite que las clases hijas hereden y extiendan 
 * la funcionalidad de la clase abstracta. Promueven la modularización y la reutilización del código al definir una estructura común para clases relacionadas. 
 * Esto facilita el mantenimiento y la escalabilidad de las aplicaciones. 
 * 
 * En resumen, una clase abstracta en una plantilla que define una estructura común y un conjunto de métodos abstractos 
 * que deben ser implementados por las clases hijas. Estas clases abstractas son una parte fundamental de la poo en PHP y ayudan a establecer 
 * una interfaz común y coherente para clases relacionadas en una aplicación.
 */

abstract class Computer {

    public $state;

    abstract public function turn_on();

    public function turn_off()
    {
        $this->state = "off";
    }
}


class Laptop extends Computer {

    public $software;

    public function turn_on() {
        $this->state = 'on';
    }

    public function run_software()
    {
        $this->software = true;
    }

}

$laptop = new Laptop();
$laptop->turn_on();
$laptop->run_software();
var_dump($laptop);
$laptop->turn_off();
var_dump($laptop);

