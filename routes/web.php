<?php


use App\Controllers\EmployeeController;
use App\Helpers\TokenHelper;

require_once '../vendor/autoload.php';

$dbConfig = require_once '../config/database.php';
$db = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}", $dbConfig['user'], $dbConfig['password']);

$controller = new EmployeeController($db);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->index();
}elseif ($uri === '/create' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->create();
}elseif ($uri === '/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $date_of_birth=$_POST['date_of_birth'];
    $age=$controller->calculateAge($date_of_birth);

    if($age >= 18){
        $controller->store($_POST);
    }else{
        echo "<p style='color: red;'>You must be at least 18 years old to proceed.</p>";
    }
} elseif ($uri === '/view' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->view($_GET['id']);
} elseif ($uri === '/edit' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->edit($_GET['id']);
} elseif (preg_match('/\/update\/(\d+)/', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($matches[1], $_POST);
} elseif (preg_match('/\/delete\/(\d+)/', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->destroy($matches[1]);
}
?>
