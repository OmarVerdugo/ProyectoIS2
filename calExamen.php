<?php 
	session_start();
	include_once('db/DB.php');
	include('funcs.php');
	
	$pdo = new PDO('mysql:host=localhost;dbname=IS2COMHIS', 'root', '');
	$db = new DB();		
	$conn = $db->getConnection();
			
	$query ="SELECT intentos FROM CalifExam WHERE idAlumno=:sesion AND tituloExam = :exam";
	$stmt = $conn->prepare($query);
	$alu = getIdAlumno();
	$examen = $_COOKIE['examen'];
	$stmt->bindParam(':sesion', $alu);
	$stmt->bindParam(':exam', $examen);
	$stmt->execute();
 	$intent = $stmt->fetch();   

	if (!isset($intent['intentos'])) 
	{
		$PREGUNTAS[1] = $_COOKIE['pregunta1'];
		$PREGUNTAS[2] = $_COOKIE['pregunta2'];
		$PREGUNTAS[3] = $_COOKIE['pregunta3'];
		unset($_COOKIE['pregunta1']);
		unset($_COOKIE['pregunta2']);
		unset($_COOKIE['pregunta3']);
		
		$aciertos = 0;

		// 	solo colecta los valores inicializados mediante el switch	//
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
			//	suma los aciertos	//
			if ($PRECORREC[$i] == 'true') 
			{
				$aciertos++;	
			}
		}	

		$promedio = ($aciertos*100)/3;
		$intent += 1;
		   
		 //		inserta la calificacion en la base de datos   //
		$query ="INSERT INTO CalifExam VALUES('0', :examen,:calif,now(),:intentos, :alumno)";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':alumno', $alu);
		$stmt->bindParam(':examen', $examen);
		$stmt->bindParam(':calif', $promedio);
		$stmt->bindParam(':intentos', $intent);
		$stmt->execute(); 				
		actualPromedio($promedio);
		header('location:resultExam.php'); 
	}else{

		if ($intent['intentos'] < 2) {
			$PREGUNTAS[1] = $_COOKIE['pregunta1'];
			$PREGUNTAS[2] = $_COOKIE['pregunta2'];
			$PREGUNTAS[3] = $_COOKIE['pregunta3'];
			unset($_COOKIE['pregunta1']);
			unset($_COOKIE['pregunta2']);
			unset($_COOKIE['pregunta3']);
			
			$aciertos = 0;

			// 	solo colecta los valores inicializados mediante el switch	//
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
				//	suma los aciertos	//
				if ($PRECORREC[$i] == 'true') 
				{
					$aciertos++;	
				}
			}	

			$promedio = ($aciertos*100)/3;
			$intentos = $intent['intentos'] + 1;
			   
			 //		inserta la calificacion en la base de datos   //
			$query ="UPDATE CalifExam 
					SET intentos = :intentos, califExam = :calif
					WHERE idAlumno = :alumno AND tituloExam = :examen";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':alumno', $alu);
			$stmt->bindParam(':examen', $examen);
			$stmt->bindParam(':calif', $promedio);
			$stmt->bindParam(':intentos', $intentos);
			$stmt->execute(); 		
			actualPromedio($promedio);		
			header('location:resultExam.php'); 
		}else{
			echo "<h3>Ya has realizado al maximo de intentos</h3>";
		}

	}

 ?>