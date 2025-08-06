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

use Dotenv\Parser\Value;

function active_sidebar($url, $contain = true)
{
    if ($contain)
        return ( strpos(currentUrl(), $url) == 0) ? "active" : '';
    else
        return currentUrl() === $url? "active" : '';
}
function errorClass($name)
{
    return erororExists($name) ? 'is-invalid' : '';
}

function errorText($name)
{
    return erororExists($name) ? '<div><small class="text-danger">' .error($name) . '</small></div>' : '';
}

function olrOrValue($name,$value)
{
    return empty(old($name)) ? $value : old($name) ;
}