<?php include('template/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Evaluacion Unidad 2</title>
	<link rel="stylesheet" type="text/css" href="css/eval.css">
</head>
<body>
	<div class="desc">
		<h3>Capitulo 2</h3>
		
		<?php 
			$query ="SELECT intentos FROM CalifExam WHERE idAlumno=:sesion AND tituloExam = :exam";
			$stmt = $conn->prepare($query);
			$alu = getIdAlumno();
			$examen = "examen 2";
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
							echo "<h3 class=\"preg\">".$i.": ¿Qué ocasionó la segunda generación de computadoras?</h3>";
							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre1\" value=\"false\" id=\"pre1_1\"/>";
							echo "<label for=\"pre1_1\">Nuevas empresas al mercado</label>";

							echo "<input type=\"radio\" name=\"pre1\" value=\"false\" id=\"pre1_2\"/>";
							echo "<label for=\"pre1_2\">Mejores precios</label>";

							echo "<input type=\"radio\" name=\"pre1\" value=\"true\" id=\"pre1_3\"/>";
							echo "<label for=\"pre1_3\">Una mejora sustancial en velocidad y procesamiento</label>";

							echo "</div>"; 
							break;	

						case 2:
							echo  "<h3 class=\"preg\">".$i.": En comparación con la primera generación, estas computadoras...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre2\" value=\"false\" id=\"pre2_1\"/>";
							echo "<label for=\"pre2_1\">Ofrecian calculos mas precisos</label>";

							echo "<input type=\"radio\" name=\"pre2\" value=\"true\" id=\"pre2_2\"/>";
							echo "<label for=\"pre2_2\">Eran más pequeñas</label>";

							echo "<input type=\"radio\" name=\"pre2\" value=\"false\" id=\"pre2_3\"/>";
							echo "<label for=\"pre2_3\">Ofrecian mas productos de software</label>";

							echo "</div>";
							break;

						case 3:
							echo "<h3 class=\"preg\">".$i.": La nueva refrigeración ocasionaba que...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre3\" value=\"true\" id=\"pre3_1\"/>";
							echo "<label for=\"pre3_1\">se calentaran menos que las de la primera generación</label>";

							echo "<input type=\"radio\" name=\"pre3\" value=\"false\" id=\"pre3_2\"/>";
							echo "<label for=\"pre3_2\">Necesitaran mayor voltaje</label>";

							echo "<input type=\"radio\" name=\"pre3\" value=\"false\" id=\"pre3_3\"/>";
							echo "<label for=\"pre3_3\">Hicieran más ruido</label>";

							echo "</div>";
							break;

						case 4:
							echo "<h3 class=\"preg\">".$i.": En esta generación aparecen las primeras...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre4\" value=\"false\" id=\"pre4_1\"/>";
							echo "<label for=\"pre4_1\">Compañias de outsourcing</label>";

							echo "<input type=\"radio\" name=\"pre4\" value=\"false\" id=\"pre4_2\"/>";
							echo "<label for=\"pre4_2\">aplicaciones que hacian uso de la internet</label>";

							echo "<input type=\"radio\" name=\"pre4\" value=\"true\" id=\"pre4_3\"/>";
							echo "<label for=\"pre4_3\">Minicomputadoras</label>";

							echo "</div>";
							break;

						case 5:
							echo "<h3 class=\"preg\">".$i.": El precio de las computadoras era...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre5\" value=\"true\" id=\"pre5_1\"/>";
							echo "<label for=\"pre5_1\">Elevado</label>";

							echo "<input type=\"radio\" name=\"pre5\" value=\"false\" id=\"pre5_2\"/>";
							echo "<label for=\"pre5_2\">Muy reducido en comparación a la primera generación</label>";

							echo "<input type=\"radio\" name=\"pre5\" value=\"false\" id=\"pre5_3\"/>";
							echo "<label for=\"pre5_3\">Mas elevado que en la primera generación</label>";

							echo "</div>";
							break;

						case 6:
							echo "<h3 class=\"preg\">".$i.": ¿Qué programa ya estaba orientado a nivel comercial?</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre6\" value=\"false\" id=\"pre6_1\"/>";
							echo "<label for=\"pre6_1\">ADA</label>";

							echo "<input type=\"radio\" name=\"pre6\" value=\"true\" id=\"pre6_2\"/>";
							echo "<label for=\"pre6_2\">COBOL</label>";

							echo "<input type=\"radio\" name=\"pre6\" value=\"false\" id=\"pre6_3\"/>";
							echo "<label for=\"pre6_3\">Microsoft Office</label>";

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
		setcookie('examen', "Examen 2");
		}else{
			echo "<h3>ya has realizado el maximo de intentos</h3>";
		}
	 ?>
	</div>

	<div class="butDis"><button class="final">Finalizar</button></div>

</body>
</html>