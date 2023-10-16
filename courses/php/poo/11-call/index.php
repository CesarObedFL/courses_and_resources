<?php

class Person {
    private $name;
    private $age;
    private $city;

    public function __construct($name, $age, $city)
    {
        $this->name = $name;
        $this->age = $age;
        $this->city = $city;
    }

    public function __call($name, $arguments)
    {
        $prefix_method = substr($name, 0, 3);
        
        if ( $prefix_method == 'get' ) {
            $method_name = substr(strtolower($name), 3);

            if ( isset($this->$method_name) ) {
                return $this->$method_name;
            } else {
                return "Inexistent Method!...";
            }
        } else if ( $prefix_method = 'set' ) {
            $method_name = substr(strtolower($name), 3);
            
            if ( isset($this->$method_name) ) {
                $this->$method_name = $arguments[0];
                //var_dump($arguments);
            } else {
                return "Inexistent Method!...";
            }
            
        } else {
            return "Inexistent Method!...";
        }
    }
}


$person = new Person('Cesar', 31, 'CDMX');

echo $person->getName() . "<br>";
echo $person->getAge() . "<br>";
echo $person->getCity() . "<br>";
$person->setName('Obed');
$person->setAge('19');
$person->setCity('Guadalajara');
echo '<h5>new values</h5><br>';
echo $person->getName() . "<br>";
echo $person->getAge() . "<br>";
echo $person->getCity() . "<br>";