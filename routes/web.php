<?php

use App\Controllers\EmployeeController;

require_once '../vendor/autoload.php';

$dbConfig = require_once '../config/database.php';
$db = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}", $dbConfig['user'], $dbConfig['password']);

$controller = new EmployeeController($db);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->index();
} elseif ($uri === '/create' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once '../resources/views/create.php';
} elseif ($uri === '/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST);
} elseif (preg_match('/\/edit\/(\d+)/', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->edit($matches[1]);
} elseif (preg_match('/\/update\/(\d+)/', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($matches[1], $_POST);
} elseif (preg_match('/\/delete\/(\d+)/', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->destroy($matches[1]);
}
