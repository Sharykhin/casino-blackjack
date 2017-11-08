<?php

use Casino\Service\DI;

require_once 'bootstrap.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$params = [];
if (strpos($uri, '/images') === 0) {
    $controller = 'StaticController';
    $action = 'imageAction';
    preg_match("/^\\/images\\/(.*)$/", $uri, $matches);
    $image = $matches[1];
    $params[] = $image;

} else {
    switch ($uri) {
        case '/':
            $controller = 'HomeController';
            $action = 'indexAction';
            break;
        case '/actions/gameStart':
            if ($method === 'POST') {
                $controller = 'GameController';
                $action = 'startAction';
            }
            break;
        case '/actions/gameStop':
            if ($method === 'POST') {
                $controller = 'GameController';
                $action = 'gameStop';
            }
            break;
        default:
            $controller = 'HomeController';
            $action = 'nofFoundAction';
    }
}



$controller = DI::make("Casino\\Controller\\{$controller}");

call_user_func_array([$controller, $action], $params);
