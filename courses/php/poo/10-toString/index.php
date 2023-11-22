<?php

/**
 * Los métodos mágicos en PHP son métodos predefinidos en las clases que permiten realizar acciones especiales y personalizadas 
 * en respuesta a ciertos eventos o acciones que involucran objetos de esas clases. Estos métodos tienen nombres específicos precedidos 
 * por un doble guion bajo (__). Algunos métodos mágicos en PHP son:
 * 
 * __construct():   Este método se llama automáticamente cuando se crea un nuevo objeto de la clase. 
 *                  Se utiliza para inicializar propiedades y realizar tareas de configuración necesarias. 
 * 
 * __destruct():    Este método se llama automáticamente cuando un objeto es destruido o ya no es referenciado. 
 *                  Puede utilizarse para realizar acciones de limpieza, liberar recursos o registrar eventos de destrucción.
 * 
 * __toString():    Este método se llama automáticamente cuando un objeto se utiliza en un contexto de cadena, 
 *                  como cuando se intenta imprimir un objeto o concatenarlo con una cadena. 
 *                  Debe devolver una representación en forma de cadena del objeto.
 * 
 * __get():         Se llama cuando se intenta acceder a una propiedad inaccesible desde el exterior de la clase. 
 *                  Permite personalizar el acceso a las propiedades protegidas o privadas.
 * 
 * __set():         Se llama cuando se intenta asignar un valor a una propiedad inaccesible desde el exterior de la clase. 
 *                  Permite personalizar la asignación de valores a propiedades protegidas o privadas.
 * 
 * __call():        Se llama cuando se intenta llamar a un método inaccesible desde el exterior de la clase. 
 *                  Permite personalizar la invocación de métodos protegidos o privados.
 * 
 * __callStatic():  Similar a __call(), pero se aplica a métodos estáticos inaccesibles.
 * 
 * __isset():       Se llama cuando se utiliza la función isset() para verificar si una propiedad inaccesible existe en un objeto.
 * 
 * __unset():       Se llama cuando se utiliza la función unset() para eliminar una propiedad inaccesible de un objeto.
 * 
 * __clone():       Se llama cuando se clona un objeto con la palabra clave "clone". Permite personalizar la clonación de un objeto.
 * 
 * __sleep():       Se llama antes de serializar un objeto con la función serialize(). Permite personalizar qué propiedades se deben incluir en la serialización.
 * 
 * __wakeup():      Se llama después de deserializar un objeto con la función unserialize(). Permite realizar acciones de restauración después de la deserialización.
 * 
 * 
 * Estos métodos mágicos proporcionan una forma flexible de personalizar el comportamiento de las clases y mejorar la interacción con objetos. 
 * Pueden utilizarse para implementar patrones de diseño, controlar el acceso a propiedades y métodos, y realizar tareas específicas en 
 * respuesta a eventos relacionados con objetos.
 */

class User {
    public $name;
    public $email;

    public function __construct()
    {
        $this->name = "Cesar Obed";
        $this->email = "cesarobedfl@gmail.com";
    }

    public function __toString()
    {
        return $this->name . " : " . $this->email;
    }
}


$user = new User();

echo $user;