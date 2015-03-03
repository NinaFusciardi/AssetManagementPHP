<?php
class Connection {
    
    private static $connection = NULL;
    
    public static function getInstance() {
        if (Connection::$connection === NULL) {
            // connect to the database
            $host = "daneel";
            $database = "N00132494";
            $username = "N00132494";
            $password = "N00132494";

            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Could not connect to database");
            }
        }
        
        return Connection::$connection;
    }
}
