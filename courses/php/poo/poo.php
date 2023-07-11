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

	$cat_1 = new Animal();
	$cat_1->name = 'Micho';
	$cat_1->favorite_food = "chicken";
	$cat_1->sound = "miau";

	echo "amount of animals: " . Animal::$number_of_animals . "\n";

?>