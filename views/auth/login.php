<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Log in</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			Datos de Acceso
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				<form action="/login" method="post">
					<div class="input-group mb-3">
						<input type="email" name="email" class="form-control" placeholder="Correo Electrónico" value="<?= s($auth->email) ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-2">
						<input type="password" name="password" class="form-control" placeholder="Contraseña">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php foreach ($errors as $error) : ?>
								<div class="invalid-feedback d-block">
									<strong><?= $error; ?></strong>
								</div>
							<?php endforeach; ?>
							<button type="submit" class="btn btn-primary btn-block mt-2">Iniciar Sesión</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- jQuery -->
	<script src="/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="/js/adminlte.min.js"></script>
</body>

</html>