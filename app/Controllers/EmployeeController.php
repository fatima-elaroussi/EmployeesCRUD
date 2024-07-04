<?php

namespace App\Controllers;

use App\Models\Employee;
use PDO;

class EmployeeController {
    private $employeeModel;

    public function __construct(PDO $db) {
        $this->employeeModel = new Employee($db);
    }

    public function index() {
        $employees = $this->employeeModel->getAll();
        require '../resources/views/index.php';
    }
    public function view($id) {
        $employee = $this->employeeModel->getById($id);
        require '../resources/views/view.php';
    }

    public function create() {
        require '../resources/views/create.php';
    }

    public function store($data) {
        $image = $_FILES['image'];
    
        if ($image['name']) {
            $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/uploads/images/';
            
            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }
    
            $imagePath = $uploadDirectory . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $imagePath);
            $data['image'] = '/uploads/images/' . basename($image['name']);
        }
    
        $this->employeeModel->create($data);
        header('Location: /');
    }

    public function edit($id) {
        $employee = $this->employeeModel->getById($id);
        require '../resources/views/edit.php';
    }

    public function update($id, $data) {
        $employee = $this->employeeModel->getById($id);

        $image = $_FILES['image'];

        if ($image['name']) {
            $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/uploads/images/';

            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            $imagePath = $uploadDirectory . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $imagePath);
            $data['image'] = '/uploads/images/' . basename($image['name']);

            if (!empty($employee['image'])) {
                $oldImagePath = $_SERVER['DOCUMENT_ROOT'] . $employee['image'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        } else {
            $data['image'] = $employee['image'];
        }

        $this->employeeModel->update($id, $data);
        header('Location: /');
    }
    
    public function destroy($id) {
        $employee = $this->employeeModel->getById($id);
    
        if (!empty($employee['image'])) {
            $oldImagePath = $_SERVER['DOCUMENT_ROOT'] . $employee['image'];
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    
        $this->employeeModel->delete($id);
        header('Location: /');
    }

    public function calculateAge($date_of_birth) {
        $dob = new \DateTime($date_of_birth);
        $now = new \DateTime();
        return $now->diff($dob)->y;
    }
}
