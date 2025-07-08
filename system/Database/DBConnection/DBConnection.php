<?php
namespace System\Database\DBConnection;
use PDO;
use PDOException;

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
                return new PDO("mysql:host=".DBHOST.";dbname=".DBNAME,DBUSERNAME,DBPASSWORD,$options);
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