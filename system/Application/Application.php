<?php

namespace System\Application;

class Application
{
    public function __construct()
    {
        $this->loadingProviders();
        $this->loadingHelpers();
        $this->registerRoutes();
        $this->routing();
    }
    private  function loadingProviders()
    {
        $appConfigs = require dirname(dirname(__DIR__))."/config/app.php";
        $providers = $appConfigs['providers'];
        foreach ($providers as $provider)
        {
            $providerObject = new $provider();
            $providerObject->boot();
        }
    }

    private function loadingHelpers()
    {
        require_once dirname(__DIR__) . "/helpers/helpers.php";
        if (file_exists(dirname(dirname(__DIR__))."/app/Http/helpers/helpers.php"))
        {
            require_once dirname(dirname(__DIR__)) . "/app/Http/helpers/helpers.php";
        }
    }

    private function registerRoutes()
    {
        global $routes;
        $routes = [ "get" => [], "post" => [], "put" => [], "delete" => [] ];
        require_once dirname(dirname(__DIR__))."/routes/web.php";
        require_once dirname(dirname(__DIR__))."/routes/api.php";
    }

    private function routing()
    {
        $routing= new \System\Router\Routing();
        $routing->run();
    }
}