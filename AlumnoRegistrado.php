<?php 
	session_start();
	include_once('db/DB.php');
		$nombreAlu = $_POST['_nombreAlu'];
		$apePatAlu = $_POST['_apePatAlu'];
		$apeMatAlu = $_POST['_apeMatAlu'];
		$naciAlu = $_POST['_naciAlu'];
		$sexoAlu = $_POST['_sexoAlu'];
		$emailAlu = $_POST['_emailAlu'];

	if ( $nombreAlu != "" or $apePatAlu != "" or $apeMatAlu != "" or $sexoAlu != "" or $emailAlu != "" ) 
		{
			$pdo = new PDO('mysql:host=localhost;dbname=IS2COMHIS', 'root', '');
			$db = new DB();		
			$conn = $db->getConnection();
				
			 #	//	verifica si ese email ya esta registrado en la base de datos   //
		    $query ="SELECT idAlumno FROM Alumnos WHERE emailAlu=:email";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':email', $emailAlu);
			$stmt->execute();
		    $existencia = $stmt->fetch();
			
			if (!isset($existencia['idAlumno'])) 
			{
				#	//	recolecta el numero de id del profesor de la base de datos   //
				$sesion = $_SESSION['user'];
				$query ="SELECT idProfe FROM Profesores WHERE emailPro=:sesion";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(':sesion', $sesion);
				$stmt->execute();
			 	$sesPro = $stmt->fetch();        
				       	 


				#	//	inserta el alumno en la base de datos   //
				$query ="INSERT INTO Alumnos VALUES('0', :nombre,:apepat,:apemat,:naci,:sexo,:email,'0','default',:profe)";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(':nombre', $nombreAlu);
				$stmt->bindParam(':apepat', $apePatAlu);
				$stmt->bindParam(':apemat', $apeMatAlu);
				$stmt->bindParam(':naci', $naciAlu);
				$stmt->bindParam(':sexo', $sexoAlu);
				$stmt->bindParam(':email', $emailAlu);
				$stmt->bindParam(':profe', $sesPro['idProfe']);
				$stmt->execute(); 				
				header('location:registroAlumno.php'); 
				}else
					{
						?>
						<script>
							alert("Alumno ya registrado");
							window.location.href=('registroAlumno.php');		
						</script>
						<?php
					}
		}else
			{
				?>
				<script>
					alert("Faltan campos");
					window.location.href=('registroAlumno.php');		

				</script>
				<?php
			}

	?>