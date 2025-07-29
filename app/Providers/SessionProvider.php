<?php

namespace App\Providers;

use App\Providers\Provider;

class SessionProvider extends Provider
{

    /*
    |--------------------------------------------------------------------------
    | Sessions service provider
    |--------------------------------------------------------------------------
    |
    | Sessions are key to our programs
    | We need it to perform various actions throughout the program
    | Therefore, it's best to consolidate and send it to all pages
    | 
    */
    public function boot()
    {
        session_start();
        if (isset($_SESSION['old']))
            unset($_SESSION['temporary_old']);

        if (isset($_SESSION['old']))
        {
            $_SESSION['temporary_old'] = $_SESSION['old'];
            unset($_SESSION['old']);
        }

        $params = [];
        $params = !isset($_POST) ? $params : array_merge($params,$_POST);
        $params = !isset($_GET) ? $params : array_merge($params,$_GET);
        $_SESSION['old'] = $params;
        unset($params);


        if (isset($_SESSION['temporary_flash']))
            unset($_SESSION['temporary_flash']);

        if (isset($_SESSION['flash']))
        {
            $_SESSION['temporary_flash'] = $_SESSION['flash'];
            unset($_SESSION['flash']);
        }

        if (isset($_SESSION['temporary_errorFlash']))
            unset($_SESSION['temporary_errorFlash']);

        if (isset($_SESSION['errorFlash']))
        {
            $_SESSION['temporary_errorFlash'] = $_SESSION['errorFlash'];
            unset($_SESSION['errorFlash']);
        }
    }
}