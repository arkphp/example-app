<?php
function getControllerAction($path) {
    if (!preg_match('#^(.*)/([^/]*)$#', $path, $match)) {
        return false;
    }

    $controller = $match[1];
    $controller = trim($controller, '/');

    $controllerParts = explode('/', $controller);
    $controllerParts = array_map(function($part) {
        $part = preg_split("#[_-]#", $part);
        $part = array_map('ucfirst', $part);
        $part = implode('', $part);

        return $part;
    }, $controllerParts);

    $controller = implode('\\', $controllerParts);

    $action = $match[2];
    $part = preg_split("#[_-]#", $action);
    $part = array_map('ucfirst', $part);
    $part = implode('', $part);
    $action = $part;

    return [$controller, $action];
}

$app = app();
$app
    ->add(['GET', 'POST', 'PUT', 'DELETE'], '{path_:[A-Za-z0-9/_-]*}', function($vars) use ($app) {
        $path = $vars['path_'];
        $controllerAndAction = getControllerAction($path);
        if (!$controllerAndAction) {
            return $app->emit('not_found');
        }
        list ($controller, $action) = $controllerAndAction;

        if (!$controller) {
            $controller = 'Home';
        }

        if (!$action) {
            $action = 'index';
        }

        $controllerClass = '\\App\\Http\\'.$controller;
        $method = $action.'Action';
        if (!class_exists($controllerClass)) {
            return $app->emit('not_found');
        }

        $c = new $controllerClass();
        if (!method_exists($c, $method)) {
            return $app->emit('not_found');
        }

        echo $c->$method();
    })
    ->on('not_found', function() {
        header('HTTP/1.1 404 Not Found');
        echo 'Page not found';
        return false;
    })
    ->on('exception', function($e) {
        echo $e;
        echo 'exception';
        return false;
    })
    ;