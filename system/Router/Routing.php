<?php
namespace System\Router;

class Routing
{
    private $currrent_route;
    private $method_field;
    private $routes;
    private $values = [];

    public function __construct()
    {
        $this->currrent_route=explode('/',CURRENT_ROUT);
        $this->method_field=$this->methodField();
        global $routes;
        $this->$routes=$routes;
    }
}