<?php

namespace App\Providers;

use App\Ads;
use App\Category;
use App\Post;
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
        Composer::view("app.index", function (){
            $ads = Ads::all();
            $sumArea = 0;
            foreach ($ads as $advertise)
            {
                $sumArea += (int) $advertise->area;
            }
            $usersCount = count(User::all());
            $postsCount = count(Post::all());
            return [
                "sumArea"       => $sumArea,
                "usersCount"    => $usersCount,
                "adsCount"      => count($ads),
                "postsCount"    => $postsCount
            ];
        });

    }

}