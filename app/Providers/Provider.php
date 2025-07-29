<?php

namespace App\Providers;

abstract class Provider
{

    /*
    |--------------------------------------------------------------------------
    | class provider
    |--------------------------------------------------------------------------
    |
    | This class is an abstract class
    | All providers must inherit from this class
    | and complete its boot method personally
    | Any provider that inherits from this class
    | It has its own behavior, but it is organized.
    | 
    */
   abstract public function boot();

}