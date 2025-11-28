<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => 'home.php',
    '/login' => 'login.php',
    '/users' => 'users.php'
];

$title = "Мій сайт";

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
    $title = ucfirst(trim($uri, '/')) ?: 'Головна';
    require __DIR__ . "/pages/$page";
} else {
    http_response_code(404);
    require __DIR__ . "/pages/404.php";
}
