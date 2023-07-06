<?= "PHP Object Oriented Programming"?>

<?php 
    class Animal implements Singable {
        protected $name;
		protected $favoriteFood;
		protected $sound;
		protected $id;
		
		public static $number_of_animals = 0;
		
		const PI = "3.14159";
		
		function getName() { return $this->name; }
		function setName($name) { $this->name = $name; }

        function __construct() {
			$this->id = rand(100,999);
			echo $this->id . " has been assigned" ."\n";
			Animal::$number_of_animals++;
		}
    }

?>