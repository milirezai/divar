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

    private function crateTables()
    {
        $migrations=$this->getMigrations();
        $dbConnection= DBConnection::dbConnection();
        foreach ($migrations as $migration)
        {
            $statement= $dbConnection->prepare($migration);
            $statement->execute();
        }
        return true;
    }
    
 }