<?php

return 
[

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */
    "APP_TITLE" => "Damavand",

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | The main address of the project is
    | You can use your desired port instead of the default port
    | The port used must be empty
    | is your domain address
    |
    */
    "BASE_URL" => "http://localhost:8080",

    /*
    |--------------------------------------------------------------------------
    | Application Directory
    |--------------------------------------------------------------------------
    |
    | The main project directory's address
    | is defined to simplify path definitions.
    |
    */
    "BASE_DIR" => dirname(__DIR__),

    /*
    |--------------------------------------------------------------------------
    | Application providers
    |--------------------------------------------------------------------------
    |
    | Provider registration occurs here
    |
    */
    "providers" =>
    [
        \App\Providers\SessionProvider::class,
        \App\Providers\AppServiceProvider::class,
    ]
    
];