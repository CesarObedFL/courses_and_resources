<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/gantt_chart/config/database.php';

class WSController 
{
    /**
     * function to get all the pop_ws ordered by id
     * @return Query with the data
     */
    public static function get_all_ws()
    {
        $sql = "SELECT * FROM POP_WS ORDER BY ID ASC";
        $ws = Database::connect()->query($sql);
        return $ws;
    }

}