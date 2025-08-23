<?php

function view($dir,$vars=[])
{
    $viewBuilder = new \System\View\ViewBuilder();
    $viewBuilder->run($dir);
    $viewVars = $viewBuilder ->vars;
    $content = $viewBuilder->content;
    empty($viewVars) ? :extract($viewVars);
    empty($vars) ? :extract($vars);
    eval("?>".html_entity_decode($content));
}

function dd($value, $die = true)
{
    echo "<pre>";
    var_dump($value);
    if ($die)
        exit();
}


function html($text)
{
    return html_entity_decode($text);
}

function old($name)
{
    if (isset($_SESSION["temporary_old"][$name]))
    {
        return $_SESSION["temporary_old"][$name];
    }
    else
    {
        return null;
    }
}

function flash($name, $msg = null)
{
    if (empty($msg))
    {
        if (isset($_SESSION["temporary_flash"][$name]))
        {
            $temporary = $_SESSION["temporary_flash"][$name];
            unset($_SESSION['temporary_flash'][$name]);
            return $temporary;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return $_SESSION['flash'][$name] = $msg;
    }
}

function flashExists($name)
{
    return isset($_SESSION["temporary_flash"][$name]) === true ? true : false ;
}

function flashAll()
{
    if (isset($_SESSION["temporary_flash"]))
    {
        $temporary = $_SESSION["temporary_flash"];
        unset($_SESSION["temporary_flash"]);
        return $temporary;
    }
    else
    {
        return false;
    }
}

function error($name, $msg = null)
{
    if (empty($msg)) {
        if (isset($_SESSION["temporary_errorFlash"][$name])) {
            $temporary = $_SESSION["temporary_errorFlash"][$name];
            unset($_SESSION['temporary_errorFlash'][$name]);
            return $temporary;
        } else {
            return false;
        }
    } else {
        return $_SESSION['errorFlash'][$name] = $msg;
    }
}

function erororExists($name = null)
{
    if ($name === null)
    {
        return isset($_SESSION["temporary_errorFlash"]) === true ? count($_SESSION["temporary_errorFlash"]) : false;
    }
    else
    {
        return isset($_SESSION["temporary_errorFlash"][$name]) === true ? true : false;
    }
}

function errorAll()
{
    if (isset($_SESSION["temporary_errorFlash"])) {
        $temporary = $_SESSION["temporary_errorFlash"];
        unset($_SESSION["temporary_errorFlash"]);
        return $temporary;
    } else {
        return false;
    }
}

function currentDomain()
{
    $httpProtocol= (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == "on") ? "https://" :"http://";
    $currentUrl = $_SERVER['HTTP_HOST'];
    return $httpProtocol.$currentUrl;
}

function back()
{
    $http_referer= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
    redirect($http_referer);
}

function asset($src)
{
    return currentDomain().("/".trim($src,"/ "));
}

function url($url)
{
    return currentDomain().("/".trim($url,"/ "));
}
function findRouteByName($name)
{
    global $routes;
    $allRoutes= array_merge($routes['get'], $routes['post'], $routes['put'], $routes['delete'] );
    $route = null;
    foreach ($allRoutes as $element)
    {
        if ($element['name'] == $name and $element['name'] != null)
        {
            $route = $element['url'];
            break;
        }
    }
    return $route;
}

function route($name,$parameter = [])
{
    if (!is_array($parameter)){
       throw new Exception("This value must be in array form!");
    }
    $route = findRouteByName($name);
    if ($route === null){
        throw new Exception("This route does not exist!");
    }
    $parameter = array_reverse($parameter);
    $routeParamsMatch= [];
    preg_match_all("/{[^}.]*}/", $route, $routeParamsMatch);
    if (count($routeParamsMatch[0]) > count($parameter))
    {
        throw new Exception("Insufficient parameters!");
    }
    foreach ($routeParamsMatch[0] as $key => $routeMatch)
    {
        $route = str_replace($routeMatch,array_pop($parameter),$route);
    }
    return currentDomain()."/".trim($route," /");
}

function generateToken()
{
    return bin2hex(openssl_random_pseudo_bytes(32));
}

function methodField()
{
    $methodField = strtolower($_SERVER['REQUEST_METHOD']);
    if ($methodField == "post")
    {
        if(isset($_POST['_method'])){
            if($_POST['_method'] == 'put'){
                $methodField = 'put';
            }
            elseif($_POST['_method'] == 'delete'){
                $methodField = 'delete';
            }
        }
    }
    return $methodField;
}

function array_dot($array, $return_array = array(), $return_key = '') {
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $return_array = array_merge($return_array, array_dot($value, $return_array, $return_key . $key . '.'));
        } else {
            $return_array[$return_key . $key] = $value;
        }
    }
    return $return_array;
}

function currentUrl()
{
    return currentDomain().$_SERVER['REQUEST_URI'];
}
function redirect($url)
{
    $url = trim($url, '/ ');
    $url = strpos($url, currentDomain()) === 0 ?  $url : currentDomain() . '/' . $url;
    header("Location: ".$url);
    exit;
}

function move($file, $path, $name, $width = null, $height = null)
{
    return System\Service\Support\Upload\Image\ImageUpload::move($file, $path, $name, $width = null, $height = null);
}