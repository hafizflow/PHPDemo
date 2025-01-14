<?php

session_start();

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/function.php';


spl_autoload_register(function ($class) {
    $result = str_replace("\\", '/', $class);
    require base_path("{$result}.php");
});

$router = new \Core\Router();
require base_path('bootstrap.php');

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);