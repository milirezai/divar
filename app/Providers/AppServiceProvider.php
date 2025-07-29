<?php

namespace App\Providers;

use App\User;
use System\View\Composer;
class AppServiceProvider extends Provider
{

    /*
    |--------------------------------------------------------------------------
    | App service provider
    |--------------------------------------------------------------------------
    |
    | The application service provider includes views and data
    | which we need in more than one view.
    | We define them in one place to avoid code duplication and improve application performance
    | and we pass them to the views we're interested in.
    | 
    */
    public function boot()
    {
        Composer::view("app.index", function ()
        {
            $users = User::all();
            return 
            [
                "sumArea" => $users
            ];
        });
    }
    
}