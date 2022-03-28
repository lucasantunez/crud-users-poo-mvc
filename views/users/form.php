<div class="form-group">
    <label>Nombre</label>
    <input class="form-control" type="text" name="user[name]" placeholder="Nombre" value="<?= s($user->name) ?>" required>
</div>
<div class="form-group">
    <label>Apellido</label>
    <input class="form-control" type="text" name="user[last_name]" placeholder="Apellido" value="<?= s($user->last_name) ?>" required>
</div>
<div class="form-group">
    <label>Email</label>
    <input class="form-control" type="email" name="user[email]" placeholder="Correo Electrónico" value="<?= s($user->email) ?>" required>
</div>
<div class="form-group">
    <label>Contraseña</label>
    <input class="form-control" type="password" name="user[password]" placeholder="Contraseña" required>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Guardar</button>
    <a class="btn btn-danger float-right" href="/users">Cancelar</a>
</div>