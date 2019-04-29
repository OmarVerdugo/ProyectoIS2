<?php 
	session_start();
	include_once('db/DB.php');
	
	$PREGUNTAS[1] = $_COOKIE['pregunta1'];
	$PREGUNTAS[2] = $_COOKIE['pregunta2'];
	$PREGUNTAS[3] = $_COOKIE['pregunta3'];
	unset($_COOKIE['pregunta1']);
	unset($_COOKIE['pregunta2']);
	unset($_COOKIE['pregunta3']);
	

	$aciertos = 0;
	for ($i=1; $i < 4 ; $i++) 
	{ 
		switch ($PREGUNTAS[$i]) 
		{
			case 1:
				$PRECORREC[$i] = $_POST['pre1'];
				break;
			case 2:
				$PRECORREC[$i] = $_POST['pre2'];
				break;
			case 3:
				$PRECORREC[$i] = $_POST['pre3'];
				break;
			case 4:
				$PRECORREC[$i] = $_POST['pre4'];
				break;
			case 5:
				$PRECORREC[$i] = $_POST['pre5'];
				break;
			case 6:
				$PRECORREC[$i] = $_POST['pre6'];
				break;

			default:
				
				break;
		}
		if ($PRECORREC[$i] == 'true') 
		{
			$aciertos++;	
		}
	}	

	
	$promedio = ($aciertos*100)/3;
	$examen = $_COOKIE['examen'];
	unset($_COOKIE['examen']);
	$intentos = 1;

	$pdo = new PDO('mysql:host=localhost;dbname=IS2COMHIS', 'root', '');
			$db = new DB();		
			$conn = $db->getConnection();
				
			$query ="SELECT idAlumno FROM Alumnos WHERE emailAlu=:sesion";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':sesion', $_SESSION['user']);
			$stmt->execute();
		 	$sesAlu = $stmt->fetch();   


			 #	//	verifica si ese email ya esta registrado en la base de datos   //
		   $query ="INSERT INTO CalifExam VALUES('0', :examen,:calif,now(),:intentos, :alumno)";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(':alumno', $sesAlu['idAlumno']);
				$stmt->bindParam(':examen', $examen);
				$stmt->bindParam(':calif', $promedio);
				$stmt->bindParam(':intentos', $intentos);
				$stmt->execute(); 				


		echo "tu promedio es: ".$promedio;
		echo "    <a href=\"http://localhost/ProyectoIS2/start.php#\">Volver a menu</a>";

 ?>