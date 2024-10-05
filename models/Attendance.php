<?php
class Attendance {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todas las asistencias
    public function getAll() {
        $stmt = $this->db->prepare("
            SELECT a.*, e.first_name, e.last_name, e.id_number
            FROM attendance a
            JOIN employees e ON a.employee_id = e.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener asistencia por ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM attendance WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear nueva asistencia
    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO attendance (employee_id, entry_time, exit_time) 
            VALUES (?, ?, ?)
        ");
        $stmt->execute([
            $data['employee_id'],
            $data['entry_time'],
            $data['exit_time']
        ]);
    }

    // Actualizar una asistencia
    public function update($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE attendance 
            SET employee_id = ?, entry_time = ?, exit_time = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $data['employee_id'],
            $data['entry_time'],
            $data['exit_time'],
            $id
        ]);
    }

    // Eliminar una asistencia
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM attendance WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
