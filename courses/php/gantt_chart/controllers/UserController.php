<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/gantt_chart/config/database.php';

class UserController 
{
    /**
     * function to get all the users ordered by id
     * @return Query with the data
     */
    public static function get_users()
    {
        $sql = "SELECT * FROM VEND20 ORDER BY CVE_VEND ASC";
        $users = Database::connect()->query($sql);
        return $users;
    }

}