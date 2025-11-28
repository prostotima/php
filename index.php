<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Faker\Factory;
use Symfony\Component\VarDumper\VarDumper;

// LOG
$log = new Logger('site');
$log->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::INFO));
$log->info("Користувач зайшов на сайт: $uri");

// FAKER
$faker = Factory::create();
$fakeName = $faker->name();

// VarDumper
VarDumper::dump($fakeName);


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
