<?php
use System\Config\Env;
return
[

    /*
    |--------------------------------------------------------------------------
    | Application Database host
    |--------------------------------------------------------------------------
    |
    | Database host IP in the project
    | By default, the IP of the mysql database host is selected.
    |
    */
    "DBHOST" => Env::get("DB_HOST"),

    /*
    |--------------------------------------------------------------------------
    | Application Database name
    |--------------------------------------------------------------------------
    |
    | The name of the project database is stored here.
    |
    */
    "DBNAME" => Env::get("DB_NAME"),

    /*
    |--------------------------------------------------------------------------
    | Application Database userName
    |--------------------------------------------------------------------------
    |
    | The database username is stored here
    | In MySQL, the default username is root
    | if you haven't changed it before.
    |
    */
    "DBUSERNAME" => Env::get("DB_USERNAME"),

     /*
    |--------------------------------------------------------------------------
    | Application Database password
    |--------------------------------------------------------------------------
    |
    | Database password is stored here
    | In MySQL, the default password is blank.
    | If you haven't changed it before.
    | 
    */
    "DBPASSWORD" => Env::get("DB_PASSWORD")
    
];