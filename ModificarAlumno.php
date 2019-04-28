<?php include('template/header.php'); ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/controlAlu.css">
		<meta charset="utf-8">
		<title>Modificar Alumno</title>
	</head>
	<body>
		<section class="studentCont">
			<div class="studentLabel">
				<h3 class="encabezado">Modificación de Alumno</h3>
				<h3>Alumno</h3>
				<h3>Nombre(s)</h3>	
				<h3>Apellido paterno</h3>
				<h3>Fecha de nacimiento</h3>		
				<h3>Correo</h3>
				
					<button id="Modificar" class="enviar formBoton" >Registrar</button>
			</div>
			<div class="studentInput">
			
				<select class="idAl">	
					<?php 
					  $stmt = $conn->prepare("SELECT idProfe FROM Profesores WHERE emailPro = :email");
                      $stmt->bindParam(':email',$_SESSION['user']);
                      $stmt->execute();
                      $stmt->setFetchMode(PDO::FETCH_ASSOC);
                      $profe = $stmt->fetch(); 

                      $conni = mysqli_connect("localhost", "root","","IS2COMHIS");

					  $query = "SELECT idAlumno, nombreAlu, apePatAlu, apeMatAlu FROM Alumnos WHERE idProfe = ?";
					  $stmt = $conni->prepare($query);
					  $stmt->bind_param("i", $profe['idProfe']);
					  $stmt->execute();
					  $result = $stmt->get_result();

					  $val=mysqli_query($conni,$stmt);	
					  while ($row = $result->fetch_assoc()) 
					  {
						echo "<option value=". $row['idAlumno']. "selected = ".$row['nombreAlu']." ".$row['apePatAlu'] .">".$row['nombreAlu']. " ". $row['apePatAlu']." ". $row['apeMatAlu']. "</option>";
					  };
				?>
					<option value=" " selected = ""> </option>
				</select>
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
								<option value=" " selected=""> </option>	
							</select>
					</div>
					<input type="email" name="" id="_correoAlu">
				</div>
			</div>	
		</section>
	</body>

