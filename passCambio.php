<?php 
	session_start();
	include_once('db/DB.php');
		
			$pdo = new PDO('mysql:host=localhost;dbname=IS2COMHIS', 'root', '');
			$db = new DB();		
			$conn = $db->getConnection();

			$pass = $_POST['_pass'];
			$alu =  $_SESSION['user'];

			 #	//	aplica la actualizacion en la base de datos   //
		    $query ="UPDATE Alumnos
					SET passAlu = :pass 
					WHERE  emailAlu = :alu";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':pass', $pass);
			$stmt->bindParam(':alu', $alu);
			$stmt->execute();	
			header('location:start.php'); 
 ?>