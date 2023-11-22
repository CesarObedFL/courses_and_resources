<?php

require $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php//libraries_project/vendor/autoload.php';


$original_img = $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php//libraries_project/images_manipulation/ying-yang.jpeg';

$saved_img = 'saved_img.png';

//echo '<img src="'.$original_img.'"></img>';

$thumb = new PHPThumb\GD($original_img);

$thumb->resize(250, 250);

//$thumb->crop(250, 250, 120, 120);
//$thumb->cropFromCenter(100);

$thumb->show();

$thumb->save($saved_img);



