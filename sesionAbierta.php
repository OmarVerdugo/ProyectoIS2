<?php 
	session_start();
	include_once('db/DB.php');
	/*//	se busca el nombre del usuario en la tabla de alumnos	 //*/
		$query ="SELECT nombreAlu FROM Alumnos where emailAlu = :email";

		$db = new DB();
		$conn = $db->getConnection();

		$stmt = $conn->prepare($query);
		$stmt->bindParam(':email',$user);
		$stmt->execute();
		

		if($result = $stmt->fetch())
		{
			$nombreP = $stmt->fetch();
			$loginLabel = $nombreP;
		}else
		{
			/*//	se busca el nombre del usuario en la tabla de profesores si no se encuentra en alumnos	 //*/
			$query ="SELECT nombrePro FROM Profesores where emailPro = :email";
			
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':email',$user);
			$stmt->execute();
			$nombreP = $stmt->fetch();
			$loginLabel = $nombreP;

			
		}


 ?>