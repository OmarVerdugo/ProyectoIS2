<?php include('template/header.php'); ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/controlAlu.css">
		<title>Registrar Alumno</title>
	</head>
	<body>
		<section class="studentCont">
			<div class="studentLabel">
				<h3 class="encabezado">Registro Alumno</h3>
				<h3>Número de control</h3>
				<h3>Nombre(s)</h3>	
				<h3>Apellido paterno</h3>
				<h3>Fecha de nacimiento</h3>		
				<h3>Correo</h3>
				
					<button id="Registrar" class="enviar formBoton" >Registrar</button>
			</div>
			<div class="studentInput">
				<input type="text" name="" id="_IDControlAlu">
				<input type="text" name="" id="_nombreAlu">
				<div class="mismoFlex apeInput">
					<input type="text" name="" id="_apePatAlu">
					<h3>Apellido materno</h3>
					<input type="text" name="" id="_apeMatAlu">
				</div>
					<div class="mismoFlex">
						<input type="date" name="" id="_naciAlu">
						<h3>Sexo</h3>
							<select>
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
								<option value="default" selected=""> </option>	
							</select>
					</div>
					<input type="email" name="" id="_correoAlu">
					<div class="formBoton">
						<button id="Limpiar">Limpiar</button>
					</div>
				</div>
			</div>	
		</section>
	</body>


