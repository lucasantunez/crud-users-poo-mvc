<div class="contenedor">
    <h1>Crear Usuario</h1>

    <?php foreach($errors as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <?php include __DIR__ . '/form.php'; ?>
    </form>
</div>