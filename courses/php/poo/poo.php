<?php 

/**
 * PHP (Hypertext Preprocessor) es un lenguaje de programación ampliamente utilizado en el desarrollo web. 
 * 
 * PHP es un lenguaje de script del lado del servidor, lo que significa que se ejecuta en el servidor web antes de que se envíe 
 * una página web al navegador del cliente. Es especialmente útil para generar contenido web dinámico.
 * 
 * Es un software de código abierto, lo que significa que es gratuito y puede ser modificado y distribuido libremente. 
 * Se encuentra disponible para una amplia variedad de plataformas, incluyendo Windows, Linux y macOS.
 * 
 * Una característica fundamental de PHP es su integración con HTML. Puedes incluir fragmentos de código PHP directamente en páginas HTML 
 * para generar contenido dinámico, lo que lo hace uno de los lenguajes más utilizados en el desarrollo web. Se utiliza para crear aplicaciones web, 
 * sitios web, blogs y una variedad de sistemas web.
 * 
 * PHP se utiliza comúnmente para interactuar con bases de datos, como MySQL, para almacenar y recuperar datos en aplicaciones web.
 * 
 * PHP incluye características de seguridad para ayudar a prevenir vulnerabilidades comunes en aplicaciones web, 
 * aunque la seguridad depende en gran medida de la implementación.
 * 
 * 
 * En resumen, PHP es un lenguaje de programación ampliamente utilizado en el desarrollo web que permite crear aplicaciones 
 * web dinámicas e interactivas. Su facilidad de uso y la gran cantidad de recursos disponibles lo hacen una opción popular 
 * para desarrolladores web de todos los niveles.
 */

/**
 * La Programación Orientada a Objetos (POO) en PHP se refiere a una metodología de programación que se basa en el concepto de "objetos" 
 * para organizar y estructurar el código de una manera más eficiente y modular.
 * 
 * En la POO, el código se organiza en torno a "clases" y "objetos": Una "clase" es un plano o plantilla que define las características y 
 * comportamientos de un objeto, mientras que un "objeto" es una instancia específica de una clase.
 * 
 * La POO permite abstraer conceptos del mundo real en forma de clases y objetos. Por ejemplo, puedes representar un "coche" 
 * como una clase con propiedades (color, modelo) y métodos (arrancar, detener).
 * 
 * Las clases en PHP pueden tener métodos especiales llamados "constructores" (para inicializar objetos) y 
 * "destructores" (para realizar acciones de limpieza antes de destruir un objeto).
 * 
 * La encapsulación es el principio de limitar el acceso a ciertos atributos y métodos de un objeto, lo que permite ocultar detalles internos 
 * y proteger la integridad de los datos. Esto se logra utilizando modificadores de acceso como "public", "private" y "protected".
 * 
 * PHP permite crear nuevas clases basadas en clases existentes, lo que se conoce como herencia. Una clase hija hereda propiedades y 
 * métodos de una clase padre, lo que fomenta la reutilización de código.
 * 
 * El polimorfismo es la capacidad de una clase para comportarse de diferentes maneras. En PHP, esto se logra mediante la implementación 
 * de métodos con el mismo nombre en diferentes clases, pero con comportamientos específicos para cada clase.
 * 
 * PHP admite la implementación de interfaces, que son contratos que especifican qué métodos deben implementarse en una clase. 
 * Los "traits" permiten la reutilización de código entre clases sin herencia.
 * 
 * Los "namespaces" ayudan a organizar y evitar conflictos de nombres entre clases y facilitan la modularización del código.
 * 
 * La POO en PHP se utiliza ampliamente en el desarrollo web, especialmente en la creación de aplicaciones y sitios web dinámicos. 
 * Frameworks populares como Laravel y Symfony se basan en la POO.
 * 
 * PHP combina la programación orientada a objetos con características de programación funcional, lo que permite enfoques flexibles para resolver problemas.
 * 
 * 
 * En resumen, la Programación Orientada a Objetos en PHP es una metodología que se basa en la creación de clases y objetos para estructurar 
 * y organizar el código de una manera más eficiente y modular. Esta aproximación se utiliza extensamente en el desarrollo web y es 
 * fundamental para construir aplicaciones web escalables y mantenibles.
 * 
 */

class Animal implements Singable {
	
	protected $id;
	protected $name;
	protected $favorite_food;
	protected $sound;
	
	public static $number_of_animals = 0;
	
	const PI = "3.14159";
	
	function getName() 
	{ 
		return $this->name; 
	}

	function setName($name) 
	{ 
		$this->name = $name; 
	}

	function __construct() 
	{
		$this->id = rand(100,999);
		echo $this->id . " has been assigned" ."\n";
		Animal::$number_of_animals++;
	}

	function __destruct() 
	{
		echo $this->name . " is being destroyed" . "\n";
	}

	// magic getter
	function __get($attribute) 
	{
		echo "asked for " . $attribute;
		return $this->$attribute;
	}

	// magic setter
	function __set($attribute, $value) 
	{
		echo "set " . $attribute . " to " . $value . "\n";
		switch($attribute) {
			case "name":
				$this->name = $value;
				break;
			case "favorite_food":
				$this->favorite_food = $value;
				break;
			case "sound":
				$this->sound = $value;
				break;
			default:
				echo $attribute . " not found";
				break;
		}
		
	}

	function __toString()
	{
		return $this->name . " says " . $this->sound . " give me some " . $this->favorite_food . " please!...\n";
	}

	function run() 
	{
		echo $this->name . " runs..." . "\n";
	}

	function sing()
	{
		return $this->name . " is singing: " . $this->sound . "\n";
	}

} /** /. class Animal */

/** inheritance */
class Dog extends Animal implements Singable {
	function run()
	{
		echo $this->name . " runs like crazy..." . "\n";
	}

	function sing()
	{
		return $this->name . " is singing: " . $this->sound . "\n";
	}
}
/** /. inheritance */

/** interface */
interface Singable
{
	public function sing();
}
/** /. interface */

$dog_1 = new Animal();
$dog_1->name = "Megan";
$dog_1->favorite_food = "chicken, vegetables and dogfood";
$dog_1->sound = "waauu";

echo "amount of animals: " . Animal::$number_of_animals . "\n";

$dog_2 = new Animal();
$dog_2->name = "Luka";
$dog_2->favorite_food = "chicken and vegetables";
$dog_2->sound = "waauu waauu";

echo "amount of animals: " . Animal::$number_of_animals . "\n";

$cat_1 = new Animal();
$cat_1->name = 'Bicha';
$cat_1->favorite_food = "catfood";
$cat_1->sound = "mau";

echo "amount of animals: " . Animal::$number_of_animals . "\n";

$dog_3 = new Animal();
$dog_3->name = "Perrito";
$dog_3->favorite_food = "dogfood";
$dog_3->sound = "waauu";

echo "amount of animals: " . Animal::$number_of_animals . "\n";

$dog_4 = new Animal();
$dog_4->name = "Huesos";
$dog_4->favorite_food = "chicken and vegetables";
$dog_4->sound = "waauu";

echo "amount of animals: " . Animal::$number_of_animals . "\n";

$dog_5 = new Animal();
$dog_5->name = "Negrito";
$dog_5->favorite_food = "dogfood";
$dog_5->sound = "";

echo "amount of animals: " . Animal::$number_of_animals . "\n";

$cat_2 = new Animal();
$cat_2->name = 'Micho';
$cat_2->favorite_food = "chicken";
$cat_2->sound = "miau";

echo "amount of animals: " . Animal::$number_of_animals . "\n";

$cat_3 = new Animal();
$cat_3->name = 'Kili Negrito';
$cat_3->favorite_food = "catfood";
$cat_3->sound = "mauau";

echo "amount of animals: " . Animal::$number_of_animals . "\n";

$cat_4 = new Animal();
$cat_4->name = 'Fili Momo';
$cat_4->favorite_food = "chicken livers";
$cat_4->sound = "mauuuu";

echo "amount of animals: " . Animal::$number_of_animals . "\n";

$dog_6 = new Animal();
$dog_6->name = "Taco";
$dog_6->favorite_food = "dogfood";
$dog_6->sound = "Waaauu";

echo "amount of animals: " . Animal::$number_of_animals . "\n";


echo $dog_1;
echo $dog_2;
echo $cat_1;
echo $dog_3;
echo $dog_4;
echo $dog_5;
echo $cat_2;
echo $cat_3;
echo $cat_4;
echo $dog_6;

$dog_1->run();
$dog_2->run();
$cat_1->run();
$dog_3->run();
$dog_4->run();
$dog_5->run();
$cat_2->run();
$cat_3->run();
$cat_4->run();
$dog_6->run();

/** polimorfism */
function singing(Singable $object)
{
	echo $object->sing();
}
/** /. polimorfism */

singing($dog_1);
singing($dog_2);
singing($cat_1);
singing($dog_3);
singing($dog_4);
singing($dog_5);
singing($cat_2);
singing($cat_3);
singing($cat_4);
singing($dog_6);

echo ($dog_1 instanceof Animal) ? "it is an aminal\n" : "it isn't an animal\n";

$animal = clone $dog_1;

?>