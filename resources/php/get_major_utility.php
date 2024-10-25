<?php 

$number_array = array(
    '1' => 13,
    '2' => 7,
    '3' => 15,
    '4' => 8,
    '5' => 12,
    '6' => 11,
    '7' => 3,
    '8' => 3,
    '9' => 5,
    '10' => 9,
    '11' => 19,
    '12' => 1,
);

function get_major_utility($array)
{
    $major = $array['1'];
    $minor = $array['1'];
    $index_major = 1;
    $index_minor = 1;
    foreach($array as $key => $n)
    {
        if ( $n < $minor && $index_minor >= $index_major && $index_minor <= (int)$key ) {
            $minor = $n;
            $index_minor = (int)$key;
        } 
        if ($n > $major && $index_major <= (int)$key ) {
            $major = $n;
            $index_major = (int)$key;
        } 

        echo '<:' . $minor . '('.$index_minor.')' . ' >:' . $major . '('.$index_major.')'. ' k:' . $key . '&nbsp;&nbsp;&nbsp;';
    }

    return ($major - $minor); 
}

echo get_major_utility($number_array);