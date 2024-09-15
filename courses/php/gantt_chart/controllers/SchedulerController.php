<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/gantt_chart/config/database.php';

class SchedulerController 
{
    /**
     * function to get all the  ordered by id
     * @return Query with the data
     */
    public static function get_scheduler_data()
    {
        $sql = "SELECT POP_WSTURNO.*, POP_WS.NOMBRE AS WS FROM POP_WSTURNO INNER JOIN POP_WS ON POP_WSTURNO.WS_ID = POP_WS.ID ORDER BY POP_WSTURNO.ID ASC";
        $scheduler_data = Database::connect()->query($sql);
        return $scheduler_data;
    }

    /**
     * function to update data by id
     * @param Array with the new data
     */
    public static function update_scheduler_data($new_init, $new_end, $new_day, $id)
    {
        $sql = "UPDATE POP_WSTURNO SET INICIO = '{$new_init}', FIN = '{$new_end}', DIASEM = '{$new_day}' WHERE ID = {$id} LIMIT 1";
        return Database::connect()->query($sql);
    }

}