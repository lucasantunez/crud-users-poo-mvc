<!-- Grupo: Usuario -->
<div class="formulario__grupo">
    <label class="formulario__label" for="name">Nombre</label>
    <div class="formulario__grupo-input">
        <input class="formulario__input" type="text" name="user[name]" placeholder="Nombre" value="<?= s($user->name) ?>">
    </div>
</div>
<!-- Grupo: Apellido -->
<div class="formulario__grupo">
    <label class="formulario__label" for="last_name">Apellido</label>
    <div class="formulario__grupo-input">
        <input class="formulario__input" type="text" name="user[last_name]" placeholder="Apellido" value="<?= s($user->last_name) ?>">
    </div>
</div>
<!-- Grupo: Email -->
<div class="formulario__grupo">
    <label class="formulario__label" for="email">Email</label>
    <div class="formulario__grupo-input">
        <input class="formulario__input" type="email" name="user[email]" placeholder="Correo Electrónico" value="<?= s($user->email) ?>">
    </div>
</div>
<!-- Grupo: Contraseña -->
<div class="formulario__grupo">
    <label class="formulario__label" for="password">Contraseña</label>
    <div class="formulario__grupo-input">
        <input class="formulario__input" type="password" name="user[password]" placeholder="Contraseña">
    </div>
</div>
<div class="formulario__grupo formulario__grupo-btn-enviar">
    <button type="submit" class="btnAceptar">Guardar</button>
    <a class="btnCancelar" href="/users">Cancelar</a>
</div>