<?php

use Core\Response;

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

// echo $_SERVER['REQUEST_URI'];

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}


function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function authorized($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    // dd(BASE_PATH . $path);
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path);
} 


function redirect($path)
{
    header("location: {$path}");
    die();
}

function old($key, $default = null)
{
    return Core\Session::get('old')[$key] ?? $default;
}