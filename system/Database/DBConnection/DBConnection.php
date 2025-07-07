<?php
namespace System\Database\DBConnection;
use PDO;
use PDOException;

class DBConnection
{
    public static $dbConnection=null;

    private function __construct()
    {}

    public static function dbConnectionInstance()
    {
        if(self::$dbConnection==null)
        {
             $dbConnectionInstance=new DBConnection();
            self::$dbConnection=$dbConnectionInstance->DBConnection();
        }
        return DBConnection::$dbConnection;
    }
    private function DBConnection()
    {}
}