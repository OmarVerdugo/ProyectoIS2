<?php 
	session_start();
	include_once('db/DB.php');
		
			$pdo = new PDO('mysql:host=localhost;dbname=IS2COMHIS', 'root', '');
			$db = new DB();		
			$conn = $db->getConnection();

			$email = $_POST['_email'];
			$alu =  $_SESSION['user'];

			 #	//	aplica la actualizacion en la base de datos   //
		    $query ="UPDATE Alumnos
					SET emailAlu = :email
					WHERE  emailAlu = :alu";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':alu', $alu);
			$stmt->execute();	
			$_SESSION['user'] = $email;
			header('location:startAlu.php'); 
 ?>