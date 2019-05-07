<?php 
	session_start();
	include_once('db/DB.php');
			
			$pass = $_POST['_pass'];
			$passc = $_POST['_passcheck'];
			$alu =  $_SESSION['user'];

			$pdo = new PDO('mysql:host=localhost;dbname=IS2COMHIS', 'root', '');
			$db = new DB();		
			$conn = $db->getConnection();

			$query ="SELECT passAlu from Alumnos WHERE emailAlu = :alu";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':alu', $alu);
			$stmt->execute();	
			$passbd = $stmt->fetch();   

			if ($passc == $pass and $pass == $passbd['passAlu']) 
			{
				
				

				 #	//	aplica la actualizacion en la base de datos   //
			    $query ="UPDATE Alumnos
						SET passAlu = :pass 
						WHERE  emailAlu = :alu";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(':pass', $pass);
				$stmt->bindParam(':alu', $alu);
				$stmt->execute();	
				header('location:startAlu.php'); 
		}else{
			?>
			<script>
				alert("Las contraseñas no coinciden o la contraseña actual es incorrecta");
				  window.location.href=('menuControlAlu.php');
			</script>
			<?php  
		}
 ?>