<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <h2>Añadir Asistencia</h2>
    <form action="/attendance/create" method="POST">
        <div class="form-group">
            <label for="employee_id">Empleado</label>
            <select class="form-control" name="employee_id" required>
                <?php foreach ($employees as $employee): ?>
                    <option value="<?= $employee['id'] ?>">
                        <?= $employee['first_name'] . ' ' . $employee['last_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="entry_time">Hora de Entrada</label>
            <input type="datetime-local" class="form-control" name="entry_time" required>
        </div>
        <div class="form-group">
            <label for="exit_time">Hora de Salida</label>
            <input type="datetime-local" class="form-control" name="exit_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
