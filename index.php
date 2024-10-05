<?php
// Incluir configuración de la base de datos
require 'config/db.php';

// Incluir los controladores y modelos necesarios
require 'controllers/AuthController.php';
require 'controllers/AttendanceController.php';
require 'controllers/EmployeeController.php'; // Añadir controlador de empleados
require 'models/Employee.php';
require 'models/Attendance.php';

// Iniciar sesión si no se ha iniciado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Instanciar los modelos con la conexión a la base de datos
$employeeModel = new Employee($pdo);
$attendanceModel = new Attendance($pdo);

// Instanciar los controladores con los modelos necesarios
$authController = new AuthController($pdo);
$attendanceController = new AttendanceController($employeeModel, $attendanceModel);
$employeeController = new EmployeeController($employeeModel); // Añadir controlador de empleados

// Obtener la URI actual
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Gestionar las rutas
switch ($uri) {
    case '/':
        if (isset($_SESSION['employee_id'])) {
            $attendanceController->list();
        } else {
            header('Location: /auth/login');
        }
        break;

    case '/auth/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        } else {
            require 'views/auth/login.php';
        }
        break;

    case '/auth/logout':
        $authController->logout();
        break;

    case '/attendance':
        if (isset($_SESSION['employee_id'])) {
            $attendanceController->list();
        } else {
            header('Location: /auth/login');
        }
        break;

    case '/attendance/create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $attendanceController->create();
        } else {
            require 'views/attendance/create.php';
        }
        break;

    case '/attendance/edit':
        if (isset($_GET['id'])) {
            $attendanceController->edit($_GET['id']);
        }
        break;

    case '/attendance/delete':
        if (isset($_GET['id'])) {
            $attendanceController->delete($_GET['id']);
        }
        break;

    case '/employees':
        if (isset($_SESSION['employee_id'])) {
            $employeeController->list();
        } else {
            header('Location: /auth/login');
        }
        break;

    case '/employees/create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $employeeController->create();
        } else {
            require 'views/employees/create.php';
        }
        break;

    case '/employees/edit':
        if (isset($_GET['id'])) {
            $employeeController->edit($_GET['id']);
        }
        break;

    case '/employees/delete':
        if (isset($_GET['id'])) {
            $employeeController->delete($_GET['id']);
        }
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        echo 'Página no encontrada';
        break;
}
?>
