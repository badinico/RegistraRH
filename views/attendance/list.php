<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <h2>Lista de Asistencias</h2>
    <button class="btn btn-primary" data-toggle="modal" data-target="#addAttendanceModal">
        <i class="fa fa-plus"></i> Añadir Asistencia
    </button>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Empleado</th>
                <th>Identificación</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attendances as $attendance): ?>
            <tr>
                <td><?= $attendance['id'] ?></td>
                <td><?= $attendance['first_name'] . ' ' . $attendance['last_name'] ?></td>
                <td><?= $attendance['id_number'] ?></td>
                <td><?= $attendance['entry_time'] ?></td>
                <td><?= $attendance['exit_time'] ?></td>
                <td>
                    <a href="/attendance/edit?id=<?= $attendance['id'] ?>" class="btn btn-warning">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                    <a href="/attendance/delete?id=<?= $attendance['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta asistencia?');">
                        <i class="fa fa-trash"></i> Eliminar
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
