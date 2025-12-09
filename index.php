<?php

require __DIR__ . '/vendor/autoload.php';

$login = htmlspecialchars($_POST['login'] ?? '', ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES, 'UTF-8');


use Classes\Database;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Faker\Factory;
use Symfony\Component\VarDumper\VarDumper;
use Carbon\Carbon;

// -------------------------------------------------------
// 1. Composer тест
// -------------------------------------------------------
echo "Composer підключено!<br>";


// -------------------------------------------------------
// 2. Логування (Monolog)
// -------------------------------------------------------
$log = new Logger('site');
$log->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::INFO));
$log->info("Користувач зайшов на сайт: " . ($_SERVER['REQUEST_URI'] ?? '/'));


// -------------------------------------------------------
// 3. Faker — тестове ім'я
// -------------------------------------------------------
$faker = Factory::create();
$fakeName = $faker->name();
VarDumper::dump($fakeName);


// -------------------------------------------------------
// 4. Carbon — поточний час
// -------------------------------------------------------
$now = Carbon::now()->toDateTimeString();
echo "Зараз: $now <br>";


// -------------------------------------------------------
// 5. Тест Бази Даних 
// -------------------------------------------------------
/*
Database::insertUser("tima", "12345");
$user = Database::selectUser("tima");
VarDumper::dump($user);
*/


// -------------------------------------------------------
// 6. Router
// -------------------------------------------------------
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/'       => 'home.php',
    '/login'  => 'login.php',
    '/users'  => 'users.php',
    '/404'    => '404.php',
    '/aboutme'=> 'aboutme.php'
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
