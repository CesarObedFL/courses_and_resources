<?php

class Database {

    public static function connect()
    {
        $connection = new mysqli("localhost", "user", "password", "database");

        $connection->query("SET NAMES 'utf8'");

        return $connection;
    }

}