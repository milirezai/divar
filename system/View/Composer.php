<?php

namespace System\View;

class Composer
{
    private static $instance;
    private $vars = [];
    private $viewArray = [];
    private $registerViewArray = [];

    private function __construct()
    {

    }

    private function registerView($name, $callback)
    {
        $this->registerViewArray[$name] = $callback;
    }

     private function setViewArray($viewArray)
    {
        $this->viewArray = $viewArray;
    }

    private function getViewVars()
    {
        foreach ($this->viewArray as $view)
        {
            if (isset($this->registerViewArray[str_replace('/','.',$view)]))
            {
                $callback = $this->registerViewArray[str_replace('/','.',$view)];
                $viewVars = $callback();
                foreach ($viewVars as $key => $value)
                {
                    $this->vars[$key] = $value;
                }
            }
        }
        return $this->vars;
    }

    public static function __callStatic($name, $arguments)
    {
        $instance = self::getInstance();
        switch($name)
        {
            case "view":
                return call_user_func_array(array($instance, "registerView"), $arguments);
            break;
            case "setViews":
                return call_user_func_array(array($instance, "setViewArray"), $arguments);
            break;
            case "getVars":
                return call_user_func_array(array($instance, "getViewVars"), $arguments);
            break;
        }
    }

    private static function getInstance()
    {
        if(empty(self::$instance))
        self::$instance = new self;
        return self::$instance;
    }
}