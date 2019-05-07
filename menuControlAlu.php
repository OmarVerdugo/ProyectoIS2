<?php include('template/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Control de alumno</title>
	<link rel="stylesheet" type="text/css" href="css/controlAlu.css">

</head>
<body>
	<div class="studentCont">				
		<div>
		<form action="passCambio.php" method="POST">
		<h3>Modificar contraseña</h3>
		<input type="password" name="_pass" id="_pass">
		<button>Modificar</button>
		</form></div>

		<div>
		<form action="emailCambio.php" method="POST">
		<h3>Modificar e-mail</h3>
		<input type="e-mail" name="_email" id="_email">
		<button>Modificar</button>
		</form></div>

	</div>	
		
</body>
</html>