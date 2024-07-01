<?php

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

    public function edit($id) {
        $employee = $this->employeeModel->getById($id);
        require_once '../resources/views/edit.php';
    }

    public function update($id, $data) {
        $this->employeeModel->update($id, $data);
        header('Location: /');
    }

    public function destroy($id) {
        $this->employeeModel->delete($id);
        header('Location: /');
    }
}
