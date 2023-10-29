<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/mvc/config/database.php';

class BaseModel {

    public $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // database functions 
    public function get_all($table)
    {
        $query = $this->db->query("SELECT * FROM $table ORDER BY id DESC");
        return $query;
    }
}