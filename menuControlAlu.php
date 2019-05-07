<?php include('template/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Control de alumno</title>
	<link rel="stylesheet" type="text/css" href="css/controlAlu.css">

</head>
<body>
	<div class="studentContAlu">				
		<div>
		<form action="passCambio.php" method="POST">
		<h3>Modificar contraseña</h3>
		<input type="password" name="_passcheck" id="_pass" placeholder="Contraseña actual">
		<input type="password" name="_pass" placeholder="Contraseña nueva">
		<button>Modificar</button>
		</form></div>

		<div>
		<form action="emailCambio.php" method="POST">
		<h3>Modificar e-mail</h3>
		<input type="e-mail" name="_email" id="_email" placeholder="Nuevo e-mail">
		<input type="password" name="_pass" placeholder="Contraseña actual">
		<button>Modificar</button>
		</form></div>

	</div>	
		
</body>
</html>