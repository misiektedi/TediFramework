<?php

use Molkuski\TediFramework\TediConfig;

class TediDatabase
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $db_driver = TediConfig::get('app', 'database/db_driver');
        $db_host = TediConfig::get('app', 'database/db_host');
        $db_port = TediConfig::get('app', 'database/db_port');
        $db_name = TediConfig::get('app', 'database/db_name');
        $db_username = TediConfig::get('app', 'database/db_username');
        $db_password = TediConfig::get('app', 'database/db_password');

        $dsn = "{$db_driver}:host={$db_host};dbname={$db_name};port={$db_port}";

        try {
            $this->connection = new PDO($dsn, $db_username, $db_password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection error: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new TediDatabase();
        }
        return self::$instance->connection;
    }
}
