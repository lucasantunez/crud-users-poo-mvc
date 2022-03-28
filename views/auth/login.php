<div class="content-wrapper" style="min-height: 398px;">
	<div class="content">
		<div class="container">

			<?php foreach ($errors as $error) : ?>
				<div class="alerta error">
					<?php echo $error; ?>
				</div>
			<?php endforeach; ?>

			<h4>Datos de Acceso</h4>
			
			<form class="formulario" method="POST" action="/login">
				<!-- Grupo: Usuario -->
				<div class="">
					<label class="">Email</label>
					<div class="">
						<input class="" type="email" name="email" placeholder="Correo Electrónico">
					</div>
				</div>
				<!-- Grupo: Contraseña -->
				<div class="">
					<label class="">Contraseña</label>
					<div class="">
						<input class="" type="password" name="password" placeholder="Contraseña">
					</div>
				</div>
				<div class="">
					<button class="btn btn-success" type="submit">Iniciar Sesión</button>
				</div>
			</form>
			
		</div>
	</div>
</div>