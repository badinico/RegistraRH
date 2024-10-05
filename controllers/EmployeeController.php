<?php
class EmployeeController {
    private $employee;

    public function __construct($employee) {
        $this->employee = $employee;
    }

    // Mostrar la lista de empleados
    public function list() {
        $employees = $this->employee->getAll();
        require 'views/employees/list.php';
    }

    // Crear un nuevo empleado
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'id_number' => $_POST['id_number'],
                'password' => $hashedPassword,
                'role' => $_POST['role']
            ];
            $this->employee->create($data);
            header('Location: /employees');
        }
        require 'views/employees/create.php';
    }

    // Editar un empleado
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'id_number' => $_POST['id_number'],
                'password' => $hashedPassword,
                'role' => $_POST['role']
            ];
            $this->employee->update($id, $data);
            header('Location: /employees');
        }
        $employee = $this->employee->getById($id);
        require 'views/employees/edit.php';
    }

    // Eliminar un empleado
    public function delete($id) {
        $this->employee->delete($id);
        header('Location: /employees');
    }
}
?>
