<?php 
	session_start();
	include_once('db/DB.php');

	
	$alumno = $_SESSION['user'];	
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
	echo $promedio;
	

 ?>