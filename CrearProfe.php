<?php include('template/header.php'); ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/controlAlu.css">
		<title>Registrarse</title>
	</head>
	<body>
		<section class="studentCont">
			<div class="studentLabel">
				<h3 class="encabezado">Registro Profesor</h3>
				<h3>Nombre(s)</h3>	
				<h3>Apellido paterno</h3>
				<h3>Contraseña</h3>	
				<h3>Fecha de nacimiento</h3>	
				<h3>Correo</h3>
					<form action="ProfeRegistrado.php" method="POST">
					<button id="Registrar" class="enviar formBoton" >Registrarse</button>
			</div>
			<div class="studentInput">
				<input type="text" name="_nombrePro" id="_nombrePro">
				
				<div class="mismoFlex apeInput">
					<input type="text" name="_apePatPro" id="_apePatPro">
					<h3>Apellido materno</h3>
					<input type="text" name="_apeMatPro" id="_apeMatPro">
				</div>
				<div class="mismoFlex">
					<input type="password" name="_pass1">
					<h3>Repita contraseña</h3>
					<input type="password" name="_pass2">
				</div>
					<div class="mismoFlex">
						<input type="date" name="_naciPro" id="_naciPro">
						<h3>Sexo</h3>
							<select name="_sexoPro">
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
								<option value="" selected=""> </option>	
							</select>
					</div>
					<input type="email" name="_emailPro" id="_correoPro">
					<div class="formBoton">
					</div>
				</div>
			</div>	
		</section>
	</body>


