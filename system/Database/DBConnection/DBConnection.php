<?php
namespace System\Database\DBConnection;
use PDO;
use PDOException;
use System\Config\Config;

class DBConnection
    {
        private static $dbConnection=null;
    
        private function __construct()
        {}
    
        public static function dbConnection()
        {
            if(self::$dbConnection==null)
            {
                 $dbConnectionInstance=new DBConnection();
                self::$dbConnection=$dbConnectionInstance->getDBConnection();
            }
            return self::$dbConnection;
        }

        private function getDBConnection()
        {
            $options=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
            try
            {
                return new PDO("mysql:host=".Config::get("database.DBHOST").";dbname=".Config::get("database.DBNAME"),Config::get("database.DBUSERNAME"),Config::get("database.DBPASSWORD"),$options);
            }
            catch (PDOException $e)
            {
                echo $e->getMessage();
                return false;
            }
        }
        
        public static function newInsertId()
        {
            return self::dbConnection()->lastInsertId();
        }
    }