<?php include('template/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Evaluacion Unidad 1</title>
	<link rel="stylesheet" type="text/css" href="css/eval.css">
</head>
<body>
	<div class="desc">
		<?php 
			$examen = $_COOKIE['examen'];
			unset($_COOKIE['examen']);

			switch ($examen) {
				case "Examen 1":
					$capitulo = 1;
					break;
				case "Examen 2":
					$capitulo = 2;
					break;
					case "Examen 3":
					$capitulo = 3;
					break;
				case "Examen 4":
					$capitulo = 4;
					break;
					case "Examen 5":
					$capitulo = 5;
					break;
				case "Examen 6":
					$capitulo = 6;
					break;
					case "Examen 7":
					$capitulo = 7;
					break;
				case "Examen 8":
					$capitulo = 8;
					break;
				
				default:
					$capitulo = 'final';
					break;
			}

			$query ="SELECT califExam, intentos FROM CalifExam WHERE idAlumno=:sesion AND tituloExam = :exam";
			$stmt = $conn->prepare($query);
			$alu = getIdAlumno();
			$stmt->bindParam(':sesion', $alu);
			$stmt->bindParam(':exam', $examen);
			$stmt->execute();
		 	$calif = $stmt->fetch(); 

			echo "<h3>Capitulo: ".$capitulo;
			echo "<h3>Calificacion: ".$calif['califExam']."</h3>";
		 ?>

		</div>

	<div class="exam">
		<?php 
		if ($calif['califExam']<100 and $calif['califExam']>34)
			{
				$aciertos = 2;
			} else if ($calif['califExam']==100) {
				$aciertos = 3;
			}else if($calif['califExam'] > 0 and $calif['califExam'] < 34 ){
				$aciertos = 1;
			}else{
				$aciertos = 0;
			}
			echo "<h3>Aciertos: " . $aciertos. "</h3>";
			echo "<h3>Errores: " . abs($aciertos - 3)."</h3>" ;
			echo "<h3>Intentos restantes: ".abs($calif['intentos']-2)."</h3>";
		?>

	</div>

</body>
</html>