<?php

class Database {

    private static $server = 'cyr_database_container';
    private static $username = 'root'; // using root for user permissions
    private static $password = 'secret';
    private static $database = 'cyr_db';

    public static function connect()
    {
        $connection = new mysqli(self::$server, self::$username, self::$password, self::$database);

        $connection->query("SET NAMES 'utf8'");

        return $connection;
    }

}