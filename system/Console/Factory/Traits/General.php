<?php
namespace System\Console\Factory\Traits;
trait General
{
    public function msg($msg,$color)
    {
        switch ($color)
        {
            case 'green':
                $setColor = "\033[32m".$msg."\033[0m\n";
                break;
            case 'red':
                $setColor = "\033[31m".$msg."\033[0m\n";
                break;
            case 'blue':
                $setColor = "\033[34m".$msg."\033[0m\n";
                break;
            case 'yellow':
                $setColor = "\033[33m".$msg."\033[0m\n";
                break;
        }
        return $setColor;
    }
    public function count($array, $Length)
    {
        return count($array) > $Length ? true : false ;
    }
    public function path($path, $name)
    {
        $paths = require dirname(__DIR__) . "/Commands/MovePaths.php";
        return $paths[$path].$name.".php";
    }
}