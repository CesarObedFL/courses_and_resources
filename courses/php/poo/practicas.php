<?php

// basics 
$x = 0;
if ($x-- == 0)
    echo $x;

echo $x;

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



?>