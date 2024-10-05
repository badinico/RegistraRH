<?php
class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Lógica de inicio de sesión
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_number = $_POST['id_number']; // Capturar el número de identificación
            $password = $_POST['password'];   // Capturar la contraseña

            // Verificar las credenciales en la base de datos
            $stmt = $this->db->prepare("SELECT * FROM employees WHERE id_number = ?");
            $stmt->execute([$id_number]);
            $employee = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener la fila del empleado

            if ($employee && password_verify($password, $employee['password'])) {
                // Credenciales correctas, asignar variables de sesión
                $_SESSION['employee_id'] = $employee['id'];
                $_SESSION['role'] = $employee['role']; // Guardar el rol en la sesión
                header('Location: /attendance'); // Redirigir a la página de asistencias
                exit();
            } else {
                // Credenciales incorrectas, redirigir con error
                header('Location: /auth/login?error=invalid_credentials');
                exit();
            }
        }
    }

    // Cerrar sesión
    public function logout() {
        session_destroy(); // Destruir la sesión
        header('Location: /auth/login'); // Redirigir al formulario de login
        exit();
    }
}
?>
