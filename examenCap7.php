<?php include('template/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Evaluacion Unidad 7</title>
	<link rel="stylesheet" type="text/css" href="css/eval.css">
</head>
<body>
	<div class="desc">
		<h3>Capitulo 7</h3>
		
		<?php 
			$query ="SELECT intentos FROM CalifExam WHERE idAlumno=:sesion AND tituloExam = :exam";
			$stmt = $conn->prepare($query);
			$alu = getIdAlumno();
			$examen = "examen 7";
			$stmt->bindParam(':sesion', $alu);
			$stmt->bindParam(':exam', $examen);
			$stmt->execute();
		 	$intent = $stmt->fetch();
		 	echo "<h3>Intentos: " . $intent['intentos']; 
		 ?>
	</div>

	<form action="calExamen.php" method="POST">;
	<div class="exam">
	<?php 
		$PREGUNTAS[1] = 1 ;
		$PREGUNTAS[2] = 2 ;
		$PREGUNTAS[3] = 3 ;
		$PREGUNTAS[4] = 4 ;
		$PREGUNTAS[5] = 5 ;
		$PREGUNTAS[6] = 6 ;

		$n = -1;
		$USADOS[1] = 0;
		$USADOS[2] = 0;
		$USADOS[3] = 0;  
		
		if ($intent['intentos'] < 2) 
		{
			
			for ($i=1; $i <4 ; $i++) 
			{ 
				$n = rand(1, 6);
				while($n == $USADOS[1] or $n == $USADOS[2] or $n == $USADOS[3] or $n == -1) {
					$n = rand(1, 6);
				}


				switch ($PREGUNTAS[$n]) 
					{
						case 1:
							echo "<h3 class=\"preg\">".$i.": ¿Qué cambios ven las pantallas?</h3>";
							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre1\" value=\"false\" id=\"pre1_1\"/>";
							echo "<label for=\"pre1_1\">Soportan 4k</label>";

							echo "<input type=\"radio\" name=\"pre1\" value=\"false\" id=\"pre1_2\"/>";
							echo "<label for=\"pre1_2\">Ahora son curvas</label>";

							echo "<input type=\"radio\" name=\"pre1\" value=\"true\" id=\"pre1_3\"/>";
							echo "<label for=\"pre1_3\">Ahora son planas</label>";

							echo "</div>"; 
							break;	

						case 2:
							echo  "<h3 class=\"preg\">".$i.": El almacenamiento se ve mejorado en...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre2\" value=\"false\" id=\"pre2_1\"/>";
							echo "<label for=\"pre2_1\">Dispositivos internos</label>";

							echo "<input type=\"radio\" name=\"pre2\" value=\"false\" id=\"pre2_2\"/>";
							echo "<label for=\"pre2_2\">Dispositivos externos</label>";

							echo "<input type=\"radio\" name=\"pre2\" value=\"true\" id=\"pre2_3\"/>";
							echo "<label for=\"pre2_3\">Las 2 anteriores</label>";

							echo "</div>";
							break;

						case 3:
							echo "<h3 class=\"preg\">".$i.": El precio se vio...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre3\" value=\"false\" id=\"pre3_1\"/>";
							echo "<label for=\"pre3_1\">Más reducido</label>";

							echo "<input type=\"radio\" name=\"pre3\" value=\"true\" id=\"pre3_2\"/>";
							echo "<label for=\"pre3_2\">Más elevado/label>";

							echo "<input type=\"radio\" name=\"pre3\" value=\"false\" id=\"pre3_3\"/>";
							echo "<label for=\"pre3_3\">sin cambios</label>";

							echo "</div>";
							break;

						case 4:
							echo "<h3 class=\"preg\">".$i.": ¿Con qué innova la refrigeración?</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre4\" value=\"false\" id=\"pre4_1\"/>";
							echo "<label for=\"pre4_1\">Menos gasto de energia</label>";

							echo "<input type=\"radio\" name=\"pre4\" value=\"false\" id=\"pre4_2\"/>";
							echo "<label for=\"pre4_2\">Nuevas arquitecturas</label>";

							echo "<input type=\"radio\" name=\"pre4\" value=\"true\" id=\"pre4_3\"/>";
							echo "<label for=\"pre4_3\">Refrigeración liquida</label>";

							echo "</div>";
							break;

						case 5:
							echo "<h3 class=\"preg\">".$i.": El acceso a internet ahora presenta una velocidad...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre5\" value=\"true\" id=\"pre5_1\"/>";
							echo "<label for=\"pre5_1\">Muy elevada</label>";

							echo "<input type=\"radio\" name=\"pre5\" value=\"false\" id=\"pre5_2\"/>";
							echo "<label for=\"pre5_2\">Muy elevada en las grandes empresas</label>";

							echo "<input type=\"radio\" name=\"pre5\" value=\"false\" id=\"pre5_3\"/>";
							echo "<label for=\"pre5_3\">Muy elevada en el gobierno y el ejercito</label>";

							echo "</div>";
							break;

						case 6:
							echo "<h3 class=\"preg\">".$i.": Se empiezan a conocer los primeros dispositivos de almacenamiento...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre6\" value=\"false\" id=\"pre6_1\"/>";
							echo "<label for=\"pre6_1\">Ópticos</label>";

							echo "<input type=\"radio\" name=\"pre6\" value=\"true\" id=\"pre6_2\"/>";
							echo "<label for=\"pre6_2\">En estado sólido</label>";

							echo "<input type=\"radio\" name=\"pre6\" value=\"false\" id=\"pre6_3\"/>";
							echo "<label for=\"pre6_3\">Magnéticos</label>";

							echo "</div>";
							break;
						
						default:
							echo $n;
							break;
					}

				$USADOS[$i] = $n;	
		}

		setcookie('pregunta1', $USADOS[1] );
		setcookie('pregunta2', $USADOS[2] );
		setcookie('pregunta3', $USADOS[3] );
		setcookie('examen', "Examen 7");
		}else{
			echo "<h3>ya has realizado el maximo de intentos</h3>";
		}
	 ?>
	</div>

	<div class="butDis"><button class="final">Finalizar</button></div>

</body>
</html>