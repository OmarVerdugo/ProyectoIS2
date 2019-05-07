<?php 
	session_start();
	include_once('db/DB.php');
	include('funcs.php');
		
		$pass = $_POST['_password'];
		$alu= $_POST['idAlu'];
		$pro = getIdProfe();
		
			$pdo = new PDO('mysql:host=localhost;dbname=IS2COMHIS', 'root', '');
			$db = new DB();		
			$conn = $db->getConnection();

			$query ="SELECT passPro FROM Profesores WHERE idProfe = :pro";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':pro', $pro);
			$stmt->execute();	
			$passbd = $stmt->fetch();   

	if ( $pass == $passbd['passPro'] ) 
	{			   
				#	//	elimina al alumno de la base de datos   //
				$query ="DELETE FROM Alumnos WHERE idAlumno = :alu";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(':alu', $alu);
				$stmt->execute(); 				
				header('location:registroAlumno.php'); 
				}else
					{
						?>
						<script>
							alert("Contraseña incorrecta");
							window.location.href=('EliminarAlumno.php');		
						</script>
						<?php
					}
	?>