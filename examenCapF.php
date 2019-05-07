<?php include('template/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Evaluacion Unidad 1</title>
	<link rel="stylesheet" type="text/css" href="css/eval.css">
</head>
<body>
	<div class="desc">
		<h3>Examen Final</h3>
		
		<?php 
			$query ="SELECT intentos FROM CalifExam WHERE idAlumno=:sesion AND tituloExam = :exam";
			$stmt = $conn->prepare($query);
			$alu = getIdAlumno();
			$examen = "examen f";
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
		$PREGUNTAS[7] = 7 ;
		$PREGUNTAS[8] = 8 ;
		$PREGUNTAS[9] = 9 ;
		$PREGUNTAS[10] = 10 ;
		$PREGUNTAS[11] = 11 ;
		$PREGUNTAS[12] = 12 ;


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
					$n = rand(1, 13);
				}


				switch ($PREGUNTAS[$n]) 
					{
						case 1:
							echo "<h3 class=\"preg\">".$i.": ¿Qué años abarca la primera generación?</h3>";
							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre1\" value=\"true\" id=\"pre1_1\"/>";
							echo "<label for=\"pre1_1\">1946-1959</label>";

							echo "<input type=\"radio\" name=\"pre1\" value=\"false\" id=\"pre1_2\"/>";
							echo "<label for=\"pre1_2\">1946-1959</label>";

							echo "<input type=\"radio\" name=\"pre1\" value=\"false\" id=\"pre1_3\"/>";
							echo "<label for=\"pre1_3\">1944-1959</label>";

							echo "</div>"; 
							break;	

						case 2:
							echo  "<h3 class=\"preg\">".$i.": Las computadoras hacian uso de estos para intercambiar datos</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre2\" value=\"true\" id=\"pre2_1\"/>";
							echo "<label for=\"pre2_1\">Tarjetas perforadas</label>";

							echo "<input type=\"radio\" name=\"pre2\" value=\"false\" id=\"pre2_2\"/>";
							echo "<label for=\"pre2_2\">Válvulas</label>";

							echo "<input type=\"radio\" name=\"pre2\" value=\"false\" id=\"pre2_3\"/>";
							echo "<label for=\"pre2_3\">Discos magnéticos</label>";

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
							echo "<h3 class=\"preg\">".$i.": La aparición de los circuitos integrados ocasionó la aparición de...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre5\" value=\"true\" id=\"pre5_1\"/>";
							echo "<label for=\"pre5_1\">Las minicomputadoras</label>";

							echo "<input type=\"radio\" name=\"pre5\" value=\"false\" id=\"pre5_2\"/>";
							echo "<label for=\"pre5_2\">La ley de Moore</label>";

							echo "<input type=\"radio\" name=\"pre5\" value=\"false\" id=\"pre5_3\"/>";
							echo "<label for=\"pre5_3\">Mejores ventiladores</label>";

							echo "</div>";
							break;

						case 6:
							echo "<h3 class=\"preg\">".$i.": Estas empezaron a surgir en esta generación</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre6\" value=\"false\" id=\"pre6_1\"/>";
							echo "<label for=\"pre6_1\">Las metodologias del software</label>";

							echo "<input type=\"radio\" name=\"pre6\" value=\"false\" id=\"pre6_2\"/>";
							echo "<label for=\"pre6_2\">Las GPU</label>";

							echo "<input type=\"radio\" name=\"pre6\" value=\"true\" id=\"pre6_3\"/>";
							echo "<label for=\"pre6_3\">Las empresas de software</label>";

							echo "</div>";
							break;
						case 7:
							echo  "<h3 class=\"preg\">".$i.": El costo de producción fue...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre7\" value=\"false\" id=\"pre7_1\"/>";
							echo "<label for=\"pre7_1\">El mismo</label>";

							echo "<input type=\"radio\" name=\"pre7\" value=\"true\" id=\"pre7_2\"/>";
							echo "<label for=\"pre7_2\">Reducido</label>";

							echo "<input type=\"radio\" name=\"pre7\" value=\"false\" id=\"pre7_3\"/>";
							echo "<label for=\"pre7_3\">Aumentado</label>";

							echo "</div>";
							break;

						case 8:
							echo "<h3 class=\"preg\">".$i.": Los chips se vuelven capaces de...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre8\" value=\"true\" id=\"pre8_1\"/>";
							echo "<label for=\"pre8_1\">Realizar distintas tareas</label>";

							echo "<input type=\"radio\" name=\"pre8\" value=\"false\" id=\"pre8_2\"/>";
							echo "<label for=\"pre8_2\">Guardar datos en tiempo real</label>";

							echo "<input type=\"radio\" name=\"pre8\" value=\"false\" id=\"pre8_3\"/>";
							echo "<label for=\"pre8_3\">Operar sin estar conectados a la corriente</label>";

							echo "</div>";
							break;
						case 9:
							echo "<h3 class=\"preg\">".$i.": Esta tecnologia permitia guardar datos y transportarlos de forma conveniente</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre9\" value=\"false\" id=\"pre9_1\"/>";
							echo "<label for=\"pre9_1\">Los discos duros externos</label>";

							echo "<input type=\"radio\" name=\"pre9\" value=\"false\" id=\"pre9_2\"/>";
							echo "<label for=\"pre9_2\">Los BD</label>";

							echo "<input type=\"radio\" name=\"pre9\" value=\"true\" id=\"pre9_3\"/>";
							echo "<label for=\"pre9_3\">Los CD</label>";

							echo "</div>";
							break;

						case 10:
							echo "<h3 class=\"preg\">".$i.": Fue la principal caracteristica de esta generación</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre10\" value=\"true\" id=\"pre10_1\"/>";
							echo "<label for=\"pre10_1\">La inteligencia artificial</label>";

							echo "<input type=\"radio\" name=\"pre10\" value=\"false\" id=\"pre10_2\"/>";
							echo "<label for=\"pre10_2\">La ingenieria de software</label>";

							echo "<input type=\"radio\" name=\"pre10\" value=\"false\" id=\"pre10_3\"/>";
							echo "<label for=\"pre10_3\">La internet</label>";

							echo "</div>";
							break;
						case 12:
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

						case 13:
							echo  "<h3 class=\"preg\">".$i.": El almacenamiento se ve mejorado en...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre13\" value=\"false\" id=\"pre13_1\"/>";
							echo "<label for=\"pre2_1\">Dispositivos internos</label>";

							echo "<input type=\"radio\" name=\"pre13\" value=\"false\" id=\"pre13_2\"/>";
							echo "<label for=\"pre2_2\">Dispositivos externos</label>";

							echo "<input type=\"radio\" name=\"pre13\" value=\"true\" id=\"pre13_3\"/>";
							echo "<label for=\"pre13_3\">Las 2 anteriores</label>";

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
		setcookie('examen', "Examen f");
		}else{
			echo "<h3>ya has realizado el maximo de intentos</h3>";
		}
	 ?>
	</div>

	<div class="butDis"><button class="final">Finalizar</button></div>

</body>
</html>