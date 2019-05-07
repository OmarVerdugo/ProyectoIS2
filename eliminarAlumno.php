<?php include('template/header.php'); ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/controlAlu.css">
		<title>Eliminar Alumno</title>
	</head>
	<body>
		<section class="studentCont">
			<div class="studentLabel">
				<h3 class="encabezado">Eliminar Alumno</h3>
				<h3>Alumno</h3>
				<h3>Ingrese su contraseña</h3>	
					<form action="AlumnoEliminado.php" method="POST">
					<button id="Modificar" class="enviar formBoton" >Eliminar</button>
			</div>
			<div class="studentInput">
			
				<select class="idAl" name="idAlu">	
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
				<input type="password" name="_password">
			</div>	
		</section>
	</body>

