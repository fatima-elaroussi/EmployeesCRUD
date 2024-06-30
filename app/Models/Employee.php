namespace App\Models;

use PDO;

class Employee {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM employees");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO employees (name, position, salary) VALUES (:name, :position, :salary)");
        return $stmt->execute($data);
    }

    // Add update and delete methods...
}
