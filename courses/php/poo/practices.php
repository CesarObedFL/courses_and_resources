<?php

// basics 
$x = 0;
if ($x-- == 0)
    echo $x;

echo $x;


// interpotlation
echo 'preface variables with a $ like this: $x';
echo "this week $x people";

echo <<< _END
        print a several lines
        string
        $x
        _END;

$number = 1234567890;
echo substr($number, 3, 1);

$pi = "3.1415927";
$radio = 5;
echo $pi * ($radio * $radio);

$b = 0;
$b ? print 'true' : print 'false';

/* passing variables to functions by reference */
$a1 = "WILLIAM";
$a2 = "henry";
$a3 = "gatES";

echo $a1 . " " . $a2 . " " . $a3;
fix_names($a1, $a2, $a3);
echo $a1 . " " . $a2 . " " . $a3;

function fix_names(&$n1, &$n2, &$n3)
{
    $n1 = ucfirst(strtolower($n1));
    $n2 = ucfirst(strtolower($n2));
    $n3 = ucfirst(strtolower($n3));
}

/* static variables access */
$temp = new Test();

// usando el operador de resolución de ámbito (::)
echo "Test A: " . Test::$static_property;

// usando una función que utiliza la autoreferencia de constantes (self)
echo "Test B: " . $temp->getStaticProperty();

class Test {
    static $static_property = "I'm static";

    function __construct() 
    {

    }

    function __destruct() 
    {

    }

    function getStaticProperty()
    {
        return self::$static_property;
    }
}


?>