
<!DOCTYPE html>
<html>
<head>
	<?php include('template/header.php'); ?>
</head>
<body>
	<section class="login">
					<form class="panelLogin" action="sesion.php" method="POST">
					<div class="iniciarSesion">
						<ul>
							<li><h3 class="lab">Iniciar Sesión</h3></li>
							<li><input class="campo" type="text" name="_email" placeholder="Correo:" size="32"></li>
							<li><input class="campo" type="password" name="_password" placeholder="Contraseña:" size="32"></li>
							<li><button class="btnIniciar">Iniciar</button></li>
						</ul>
					</div>
				</form>
				<div class="crear"><a href="CrearProfe.php">Registrarse (profesor) </a></div>
		</section>
</body>
</html>