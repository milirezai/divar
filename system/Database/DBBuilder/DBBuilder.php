<?php

namespace System\Database\DBBuilder;

use System\Database\DBConnection\DBConnection;

class DBBuilder
{

    public function __construct()
    {
        $this->crateTables();
        die("migrations run successfully");
    }
    
    private  function getMigrations()
    {
        $oldMigrationsArray=$this->getOldMigrations();; // reading migrations
        $migrationsDirectory= Config::get("app.BASE_DIR").DIRECTORY_SEPARATOR."database".DIRECTORY_SEPARATOR."migrations".DIRECTORY_SEPARATOR;
        $allMigrationsArray=glob($migrationsDirectory."*.php"); // all migrations
        $newMigrationsArray= array_diff($allMigrationsArray,$oldMigrationsArray);
        $this->putOldMigrations($allMigrationsArray);
        $sqlCodeArray= [];
        foreach ($newMigrationsArray as $fileName)
        {
            $sqlCode= require $fileName;
             array_push($sqlCodeArray,$sqlCode);
        }
        return $sqlCodeArray;
    }

    private  function getOldMigrations()
    {
        $file = fopen(__DIR__."/oldTables.db", "r");
        if ($file) {
            $content = fread($file, filesize(__DIR__."/oldTables.db"));
            fclose($file);
            return explode(' ',$content);
        } else {
            return [];
        }
    }

    private  function putOldMigrations($value)
    {
        file_put_contents(__DIR__."/oldTables.db",$value);
    }

    private function crateTables()
    {
        $migrations = $this->getMigrations();
        $dbConnection= DBConnection::dbConnection();
        foreach ($migrations as $migration)
        {
            $statement= $dbConnection->prepare($migration);
            $statement->execute();
        }
        return true;
    }

}