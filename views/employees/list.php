<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <h2>Lista de Empleados</h2>
    <a href="/employees/create" class="btn btn-primary">
        <i class="fa fa-plus"></i> Añadir Empleado
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Número de Identificación</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $employee['id'] ?></td>
                <td><?= $employee['first_name'] ?></td>
                <td><?= $employee['last_name'] ?></td>
                <td><?= $employee['id_number'] ?></td>
                <td><?= $employee['role'] ?></td>
                <td>
                    <a href="/employees/edit?id=<?= $employee['id'] ?>" class="btn btn-warning">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                    <a href="/employees/delete?id=<?= $employee['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este empleado?');">
                        <i class="fa fa-trash"></i> Eliminar
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
