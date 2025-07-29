<?php
namespace System\Config;

class Config
{
    private static $instance;
    private $config_nested_array = [];


    private function __construct()
    {
        $this->getConfigurationFromFiles();
    }

    private static function getInstance()
    {
        if (empty(self::$instance)) 
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function getConfigurationFromFiles()
    {
        $filePath = dirname(dirname(__DIR__))."/config/";
        foreach (glob($filePath."*.php") as $fileName) 
        {
            $config = require $fileName;
            $key = str_replace($filePath,"",$fileName);
            $key = str_replace(".php","",$key);
            $this->config_nested_array[$key] = $config;
        }
        $this->initialDefaultValues();
    }

    private function initialDefaultValues()
    {
        $temporary = str_replace($this->config_nested_array['app']['BASE_URL'],"",explode("?",$_SERVER['REQUEST_URI'])[0]);
        $temporary === "/" ? $temporary= "" : $temporary = substr($temporary, 1);
        $this->config_nested_array["app"]["CURRENT_ROUT"] = $temporary;
    }


    private function convertPointToArray($key)
    {
        $keyToArray = explode(".",$key);
        $config = $this->arrayTraversal($keyToArray);
        return $config;
    }

    private function arrayTraversal($array)
    {
        $fileName = $this->config_nested_array[$array[0]];
        $config = "";
        $config = $fileName[$array[1]];
        if (isset($array[2])) 
        {
            $config = $config[$array[2]];
        }
        if (isset($array[3]))
        {
            $config = $config[$array[3]];
        }
        if (isset($array[4]))
        {
            $config = $config[$array[4]];
        }
        if (isset($array[5]))
        {
            $config = $config[$array[5]];
        }
        if (isset($array[6]))
        {
            $config = $config[$array[6]];
        }
        return $config;
    }

    public static function get($key)
    {
        $instance = self::getInstance();
        return $instance->convertPointToArray($key);
    }

}