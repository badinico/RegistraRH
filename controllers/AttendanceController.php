<?php
class AttendanceController {
    private $employee;
    private $attendance;

    public function __construct($employee, $attendance) {
        $this->employee = $employee;
        $this->attendance = $attendance;
    }

    // Mostrar la lista de asistencias
    public function list() {
        $attendances = $this->attendance->getAll();
        $employees = $this->employee->getAll(); // Para mostrar empleados en el modal
        require 'views/attendance/list.php';
    }

    // Crear nueva asistencia
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->attendance->create($_POST);
            header('Location: /attendance');
        }
    }

    // Editar una asistencia
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->attendance->update($id, $_POST);
            header('Location: /attendance');
        }
        $attendance = $this->attendance->getById($id);
        $employees = $this->employee->getAll(); // Para mostrar empleados en el formulario de edición
        require 'views/attendance/edit.php';
    }

    // Eliminar una asistencia
    public function delete($id) {
        $this->attendance->delete($id);
        header('Location: /attendance');
    }
}
?>
