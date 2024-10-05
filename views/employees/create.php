<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <h2>Añadir Empleado</h2>
    <form action="/employees/create" method="POST">
        <div class="form-group">
            <label for="first_name">Nombre</label>
            <input type="text" class="form-control" name="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Apellido</label>
            <input type="text" class="form-control" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="id_number">Número de Identificación</label>
            <input type="text" class="form-control" name="id_number" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label for="role">Rol</label>
            <select class="form-control" name="role" required>
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
