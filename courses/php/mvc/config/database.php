<?php

class Database {

    private $server = 'cyr_database_container';
    private $username = 'root'; // using root for user permissions
    private $password = 'secret';
    private $database = 'cyr_db';

    public static function connect()
    {
        $connection = new mysqli($this->server, $this->username, $this->password, $this->database);

        $connection->query("SET NAMES 'utf8'");

        return $connection;
    }

}