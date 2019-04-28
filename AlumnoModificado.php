<?php 
	session_start();
	include_once('db/DB.php');
		
	$idAlu = $_POST['idAlu'];


	if (isset($idAlu) )
		{
			$pdo = new PDO('mysql:host=localhost;dbname=IS2COMHIS', 'root', '');
			$db = new DB();		
			$conn = $db->getConnection();

			$nombreAlu = $_POST['_nombreAlu'];
			$apePatAlu = $_POST['_apePatAlu'];
			$apeMatAlu = $_POST['_apeMatAlu'];
			$naciAlu = $_POST['_naciAlu'];
			$sexoAlu = $_POST['_sexoAlu'];
			$emailAlu = $_POST['_emailAlu'];

				
			 #	//	aplica la actualizacion en la base de datos   //
		    $query ="UPDATE Alumnos
					SET nombreAlu=:nombre,apePatAlu=:apepat,apeMatAlu=:apemat,naciAlu=:naci, sexoAlu=:sexo,emailAlu =:email  
					WHERE  idAlumno = :alu";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':alu', $idAlu);
			$stmt->bindParam(':nombre', $nombreAlu);
			$stmt->bindParam(':apepat', $apePatAlu);
			$stmt->bindParam(':apemat', $apeMatAlu);
			$stmt->bindParam(':naci', $naciAlu);
			$stmt->bindParam(':sexo', $sexoAlu);
			$stmt->bindParam(':email', $emailAlu);
			$stmt->execute();	
			header('location:ModificarAlumno.php'); 

		}

 ?>