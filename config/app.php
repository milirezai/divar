<?php

define('APP_TITLE','divar');
define('BASE_URL','http://'.$_SERVER["HTTP_HOST"].':8000');
define('BASE_DIR',realpath(__DIR__."/../"));

$temporary=str_replace(BASE_URL,'',explode('?',$_SERVER['REQUEST_URI[0]']));
$temporary==="/" ? $temporary= "" : $temporary=substr(implode('',$temporary),1);
define('CURRENT_ROUT',$temporary);

global $routes;
$routes=
[
    'get' => [],
    'post' => [],
    'put' => [],
    'delete' => []
];
 