<?= "PHP Object Oriented Programming"?>

<?php 
    class Animal implements Singable {
        
		protected $id;
		protected $name;
		protected $favorite_food;
		protected $sound;
		
		public static $number_of_animals = 0;
		
		const PI = "3.14159";
		
		function getName() { return $this->name; }
		function setName($name) { $this->name = $name; }

        function __construct() {
			$this->id = rand(100,999);
			echo $this->id . " has been assigned" ."\n";
			Animal::$number_of_animals++;
		}

		function __destruct() {
			echo $this->name . " is being destroyed" . "\n";
		}

		// magic getter
		function __get($attribute) {
			echo "asked for " . $attribute;
			return $this->$attribute;
		}

		// magic setter
		function __set($attribute, $value) {
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

    }

?>