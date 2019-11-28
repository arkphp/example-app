<?php
function getControllerAction($path) {
    if (!preg_match('#^(?:(.*):)?([^:]*)$#', $path, $match)) {
        return false;
    }

    $controller = $match[1];
    $controller = trim($controller, ':');

    $controllerParts = explode(':', $controller);
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

function cliDispatch() {
    global $argv;
    $app = app();

    $params = $argv;
    $params = array_slice($params, 1);
    if (count($params) < 1) {
        echo "Command not found\n";
        exit(-1);
    }

    $cmd = $params[0];
    $params = array_slice($params, 1);

    $controllerAndAction = getControllerAction($cmd);
    if (!$controllerAndAction) {
        echo "Command not found(invalid command format)\n";
        exit(-1);
    }

    list($controller, $action) = $controllerAndAction;

    if (!$controller) {
        $controller = 'Home';
    }

    if (!$action) {
        $action = 'index';
    }

    $controllerClass = '\\App\\Command\\'.$controller;
    $method = $action.'Action';
    if (!class_exists($controllerClass)) {
        echo "Command not found(file not found)\n";
        exit(-1);
    }

    $c = new $controllerClass();
    if (!method_exists($c, $method)) {
        echo "Command not found(action \"$method\" not found)\n";
        exit(-1);
    }

    echo $c->$method($params);
}