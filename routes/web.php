use App\Controllers\EmployeeController;

require_once '../vendor/autoload.php';

$dbConfig = require_once '../config/database.php';
$db = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}", $dbConfig['user'], $dbConfig['password']);

$controller = new EmployeeController($db);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->index();
} elseif ($uri === '/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST);
}

// Add routes for update and delete...
