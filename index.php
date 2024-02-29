<?php

$requestUri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($requestUri, '/'));

$action = isset($segments[0]) ? $segments[0] : 'home';

$method = isset($segments[1]) ? $segments[1] : 'index';

$actionFile = 'controllers/' . $action . '.php';

if (file_exists($actionFile)) {
    include $actionFile;

    $controller = new $action();
    
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        $controller->index();
    }
} else {
    include 'views/404.php';
}
?>
