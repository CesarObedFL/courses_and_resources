<?php


/**
 * Una interfaz es un tipo especial de estructura que define un conjunto de métodos que deben ser implementados por cualquier clase que la utilice. 
 * 
 * Una interfaz establece un contrato que especifica qué métodos deben estar disponibles en cualquier clase que implemente la interfaz. 
 * Cada método en una interfaz no tiene cuerpo; solo define el nombre del método, sus argumentos y su tipo de retorno. 
 * 
 * Las clases que deseen utilizar una interfaz deben implementar obligatoriamente todos los métodos definidos en esa interfaz. 
 * Esto garantiza que las clases cumplan con un conjunto específico de comportamientos y proporcionen implementaciones concretas para esos métodos.
 * 
 * A diferencia de las clases, en PHP, una clase puede implementar múltiples interfaces. Esto permite que una clase adquiera varios 
 * conjuntos de comportamientos diferentes de diferentes interfaces.
 * 
 * Permiten la reutilización de código al definir un conjunto de métodos comunes que pueden ser compartidos por múltiples clases sin necesidad 
 * de heredar de una clase base común. 
 * 
 * Promueven la separación de responsabilidades al dividir la lógica de una clase en múltiples clases relacionadas que 
 * implementan interfaces específicas.
 * 
 * Son útiles para definir contratos genéricos que las clases pueden cumplir. Esto hace que el código sea más flexible y extensible, 
 * ya que nuevas clases pueden implementar una interfaz existente sin modificar clases previamente creadas.
 * 
 * Polimorfismo: La implementación de interfaces permite el polimorfismo, lo que significa que objetos de diferentes clases que implementan 
 * la misma interfaz pueden ser tratados de la misma manera en el código, lo que facilita la escritura de código genérico y eficiente.
 * 
 * Las interfaces suelen tener nombres descriptivos que indican el conjunto de comportamientos que representan. 
 * Por ejemplo, una interfaz llamada "ReproductorMusical" podría definir métodos como "reproducir", "pausar" y "detener".
 * 
 * 
 * En resumen, las interfaces son estructuras que definen un contrato de métodos que deben ser implementados por las clases que las utilizan. 
 * Esto promueve una programación más modular, flexible y orientada a objetos, permitiendo que múltiples clases cumplan con un conjunto 
 * de comportamientos comunes y facilitando la reutilización del código.
 */
interface Computer {

    public function turn_on();
    public function turn_off();
    public function restart();
}

class Laptop implements Computer {
    private $model;

    public function get_model()
    {
        return $this->model;
    }

    public function set_model($model)
    {
        $this->model = $model;
    }

    public function turn_on()
    {
        return "turning on!...";
    }

    public function turn_off()
    {
        return "turning off!...";
    }

    public function restart()
    {
        return "Restarting!...";
    }
}


$laptop = new Laptop();

var_dump($laptop);