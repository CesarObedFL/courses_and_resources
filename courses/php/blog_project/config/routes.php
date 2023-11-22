<?php

if ( !isset($_SESSION) ) {
    session_start();
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/blog_project');
define('DIR_PATH', '/courses_and_resources/courses/php/blog_project');
define('CONFIG_PATH', ROOT_PATH.'/config');
define('ACTIONS_PATH', DIR_PATH.'/actions');
define('ASSETS_PATH', DIR_PATH.'/assets');
define('INCLUDES_PATH', ROOT_PATH.'/includes');
define('VIEWS_PATH', DIR_PATH.'/views');