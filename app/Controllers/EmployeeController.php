namespace App\Controllers;

use App\Models\Employee;

class EmployeeController {
    private $employeeModel;

    public function __construct($db) {
        $this->employeeModel = new Employee($db);
    }

    public function index() {
        $employees = $this->employeeModel->getAll();
        require_once '../resources/views/index.php';
    }

    public function store($data) {
        $this->employeeModel->create($data);
        header('Location: /');
    }

    // Add methods for update and delete...
}
