<?= "PHP Object Oriented Programming"?>

<?php 
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