<?php

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
        $stmt = $this->db->prepare("INSERT INTO employees (firstName, lastName, email, phone, position, salary,date_of_birth,image) VALUES (:firstName, :lastName, :email, :phone, :position, :salary,:date_of_birth,:image)");
        return $stmt->execute([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'position' => $data['position'],
            'salary' => $data['salary'],
            'date_of_birth' => $data['date_of_birth'],
            'image' => $data['image']
            
            
        ]);

    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE employees SET firstName = :firstName, lastName = :lastName, email = :email, phone = :phone, position = :position, salary = :salary,date_of_birth=:date_of_birth,image=:image WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'position' => $data['position'],
            'salary' => $data['salary'],
            'date_of_birth' => $data['date_of_birth'],
            'image' => $data['image']
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM employees WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM employees WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
