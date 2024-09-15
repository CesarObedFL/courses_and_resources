<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/gantt_chart/config/database.php';

class DeptoController 
{
    /**
     * function to get all the deptos ordered by id
     * @return Query with the data
     */
    public static function get_deptos()
    {
        $sql = "SELECT * FROM DEP ORDER BY CVE_DEP ASC";
        $deptos = Database::connect()->query($sql);
        return $deptos;
    }

}