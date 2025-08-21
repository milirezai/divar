<?php
namespace System\Config;

use Dotenv\Dotenv;

class Env
{
    public  function get($config)
    {
        $dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)));
        $dotenv->load();
        $config=$_ENV[$config];
        return !empty($config) ? $config : null;
    }
}