<?php 
	session_start();
	include_once('db/DB.php');
		
			$pdo = new PDO('mysql:host=localhost;dbname=IS2COMHIS', 'root', '');
			$db = new DB();		
			$conn = $db->getConnection();

			$email = $_POST['_email'];
			$pass = $_POST['_pass'];
			$alu =  $_SESSION['user'];

			$query ="SELECT passAlu from Alumnos WHERE emailAlu = :alu";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':alu', $alu);
			$stmt->execute();	
			$passbd = $stmt->fetch(); 
			if ($pass == $passbd['passAlu']) {
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
		}else{
			?>
			<script>
				alert("La contraseña es incorrecta")
				window.location.href=('menuControlAlu.php');

			</script>
			<?php  
		}
 ?>