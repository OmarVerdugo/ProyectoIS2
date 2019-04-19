<?php 
	session_start();

	include_once('db/DB.php');

	if(isset($_POST['_email'])){
		$email = $_POST['_email'];
		$password = $_POST['_password'];

		/*//	se busca usuario en la tabla de alumnos	 //*/
		$query ="SELECT emailAlu, passAlu FROM Alumnos where emailAlu=:email
		 and passAlu=:password";
		$db = new DB();
		$conn = $db->getConnection();

		$stmt = $conn->prepare($query);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password',$password);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		if($result = $stmt->fetch())
		{
			$_SESSION['user'] = $result['email'];
			header('location:start.php');
		}
		/*//	en caso de que no haya alumno se busca en la tabla de profesores	 //*/
		else
		{
			$query ="SELECT emailPro, passPro FROM Profesores where emailPro=:email
			 and passPro=:password";
			$db = new DB();
			$conn = $db->getConnection();

			$stmt = $conn->prepare($query);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':password',$password);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			if($result = $stmt->fetch())
			{
				$_SESSION['user'] = $result['email'];
				header('location:start.php');
				?>
				<script >
					alert("Usuario o contraseña incorrecta")
		            window.location.href=('index.php');
				</script>
	<?php 	} 
		}
	}
	?>