<?php include('template/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Evaluacion Unidad 4</title>
	<link rel="stylesheet" type="text/css" href="css/eval.css">
</head>
<body>
	<div class="desc">
		<h3>Capitulo 4</h3>
		
		<?php 
			$query ="SELECT intentos FROM CalifExam WHERE idAlumno=:sesion AND tituloExam = :exam";
			$stmt = $conn->prepare($query);
			$alu = getIdAlumno();
			$examen = "examen 4";
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
							echo "<h3 class=\"preg\">".$i.": ¿Qué años abarca esta generación?</h3>";
							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre1\" value=\"false\" id=\"pre1_1\"/>";
							echo "<label for=\"pre1_1\">1971-1989</label>";

							echo "<input type=\"radio\" name=\"pre1\" value=\"false\" id=\"pre1_2\"/>";
							echo "<label for=\"pre1_2\">1964-1970</label>";

							echo "<input type=\"radio\" name=\"pre1\" value=\"true\" id=\"pre1_3\"/>";
							echo "<label for=\"pre1_3\">1971-1988</label>";

							echo "</div>"; 
							break;	

						case 2:
							echo  "<h3 class=\"preg\">".$i.": El costo de producción fue...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre2\" value=\"false\" id=\"pre2_1\"/>";
							echo "<label for=\"pre2_1\">El mismo</label>";

							echo "<input type=\"radio\" name=\"pre2\" value=\"true\" id=\"pre2_2\"/>";
							echo "<label for=\"pre2_2\">Reducido</label>";

							echo "<input type=\"radio\" name=\"pre2\" value=\"false\" id=\"pre2_3\"/>";
							echo "<label for=\"pre2_3\">Aumentado</label>";

							echo "</div>";
							break;

						case 3:
							echo "<h3 class=\"preg\">".$i.": Los chips se vuelven capaces de...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre3\" value=\"true\" id=\"pre3_1\"/>";
							echo "<label for=\"pre3_1\">Realizar distintas tareas</label>";

							echo "<input type=\"radio\" name=\"pre3\" value=\"false\" id=\"pre3_2\"/>";
							echo "<label for=\"pre3_2\">Guardar datos en tiempo real</label>";

							echo "<input type=\"radio\" name=\"pre3\" value=\"false\" id=\"pre3_3\"/>";
							echo "<label for=\"pre3_3\">Operar sin estar conectados a la corriente</label>";

							echo "</div>";
							break;

						case 4:
							echo "<h3 class=\"preg\">".$i.": ¿Qué cambio ven los chips?</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre4\" value=\"false\" id=\"pre4_1\"/>";
							echo "<label for=\"pre4_1\">Se ven muy limitados por el tamaño</label>";

							echo "<input type=\"radio\" name=\"pre4\" value=\"false\" id=\"pre4_2\"/>";
							echo "<label for=\"pre4_2\">Empiezan a mostrar muchas fallas</label>";

							echo "<input type=\"radio\" name=\"pre4\" value=\"true\" id=\"pre4_3\"/>";
							echo "<label for=\"pre4_3\">Empiezan a tener muchos mas circuitos</label>";

							echo "</div>";
							break;

						case 5:
							echo "<h3 class=\"preg\">".$i.": Las computadoras empezaron a ser...</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre5\" value=\"true\" id=\"pre5_1\"/>";
							echo "<label for=\"pre5_1\">Computadores personales</label>";

							echo "<input type=\"radio\" name=\"pre5\" value=\"false\" id=\"pre5_2\"/>";
							echo "<label for=\"pre5_2\">Muy baratas</label>";

							echo "<input type=\"radio\" name=\"pre5\" value=\"false\" id=\"pre5_3\"/>";
							echo "<label for=\"pre5_3\">Inteligentes</label>";

							echo "</div>";
							break;

						case 6:
							echo "<h3 class=\"preg\">".$i.": Estas empezaron a surgir en esta generación</h3>";

							echo "<div class=\"resp\">";
							
							echo "<input type=\"radio\" name=\"pre6\" value=\"false\" id=\"pre6_1\"/>";
							echo "<label for=\"pre6_1\">Las metodologias del software</label>";

							echo "<input type=\"radio\" name=\"pre6\" value=\"true\" id=\"pre6_2\"/>";
							echo "<label for=\"pre6_2\">Los microprocesadores</label>";

							echo "<input type=\"radio\" name=\"pre6\" value=\"false\" id=\"pre6_3\"/>";
							echo "<label for=\"pre6_3\">Las empresas de software</label>";

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
		setcookie('examen', "Examen 4");
		}else{
			echo "<h3>ya has realizado el maximo de intentos</h3>";
		}
	 ?>
	</div>

	<div class="butDis"><button class="final">Finalizar</button></div>

</body>
</html>