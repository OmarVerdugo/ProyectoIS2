<?php 
	session_start();

	include_once('db/DB.php');

	if(isset($_POST['_email'])){
		$email = $_POST['_email'];
		$password = $_POST['_password'];

		/*//	se busca usuario en la tabla de alumnos	 //*/
		$query ="SELECT emailAlu, passAlu FROM Alumnos WHERE emailAlu=:email
		 AND passAlu=:password";
		$db = new DB();
		$conn = $db->getConnection();

		$stmt = $conn->prepare($query);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password',$password);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetch();
		if($result['passAlu']==$password)
		{
			$_SESSION['user'] = $email;
			header('location:startAlu.php');
		}
		/*//	en caso de que no haya alumno se busca en la tabla de profesores	 //*/
		else
		{
			$query ="SELECT emailPro, passPro FROM Profesores WHERE emailPro=:email
			 AND passPro=:password";

			$stmt = $conn->prepare($query);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':password',$password);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetch();
			if($result['passPro']==$password)
			{
				$_SESSION['user'] = $email;
				header('location:startPro.php');
			}else
				{
					?>
				<script >
					alert("Usuario o contraseña incorrecta")
		            window.location.href=('index.php');
				</script>
	<?php 	} 
		}
	}
	?>
