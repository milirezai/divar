<?php


    /*
    |--------------------------------------------------------------------------
    |  Helper functions
    |--------------------------------------------------------------------------
    |
    | Helper functions are defined here
    | They are available program-wide
    | Contact them at your preferred location.
    |
    */
function active_sidebar($url, $contain = true)
{
    if ($contain)
        return ( strpos(currentUrl(), $url) == 0) ? "active" : '';
    else
        return currentUrl() === $url? "active" : '';
}
