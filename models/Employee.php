<?php
class Employee {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los empleados
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM employees");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener empleado por ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM employees WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo empleado
    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO employees (first_name, last_name, id_number, password, role) 
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['first_name'],
            $data['last_name'],
            $data['id_number'],
            $data['password'],
            $data['role']
        ]);
    }

    // Actualizar un empleado
    public function update($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE employees 
            SET first_name = ?, last_name = ?, id_number = ?, password = ?, role = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $data['first_name'],
            $data['last_name'],
            $data['id_number'],
            $data['password'],
            $data['role'],
            $id
        ]);
    }

    // Eliminar un empleado
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM employees WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
