<?php include('template/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Evaluacion Unidad 1</title>
	<link rel="stylesheet" type="text/css" href="css/eval.css">
</head>
<body>
	<div class="desc">
		<h3>Capitulo 1</h3>
		<h3>Intentos: </h3>
		<?php # numero de intentos pendiente ?>
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


		for ($i=1; $i <4 ; $i++) 
		{ 
			$n = rand(1, 6);
			while($n == $USADOS[1] or $n == $USADOS[2] or $n == $USADOS[3] or $n == -1) {
				$n = rand(1, 6);
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
					echo "<h3 class=\"preg\">".$i.": Son componentes de las computadoras de esa generación</h3>";

					echo "<div class=\"resp\">";
					
					echo "<input type=\"radio\" name=\"pre3\" value=\"false\" id=\"pre3_1\"/>";
					echo "<label for=\"pre3_1\">Discos sólidos</label>";

					echo "<input type=\"radio\" name=\"pre3\" value=\"true\" id=\"pre3_2\"/>";
					echo "<label for=\"pre3_2\">Válvulas y cilindros</label>";

					echo "<input type=\"radio\" name=\"pre3\" value=\"false\" id=\"pre3_3\"/>";
					echo "<label for=\"pre3_3\">GPUs</label>";

					echo "</div>";
					break;

				case 4:
					echo "<h3 class=\"preg\">".$i.": ¿Quiénes fueron quienes utilizaron estas computadoras?</h3>";

					echo "<div class=\"resp\">";
					
					echo "<input type=\"radio\" name=\"pre4\" value=\"false\" id=\"pre4_1\"/>";
					echo "<label for=\"pre4_1\">Profesores</label>";

					echo "<input type=\"radio\" name=\"pre4\" value=\"false\" id=\"pre4_2\"/>";
					echo "<label for=\"pre4_2\">Doctores</label>";

					echo "<input type=\"radio\" name=\"pre4\" value=\"true\" id=\"pre4_3\"/>";
					echo "<label for=\"pre4_3\">Militares y cientificos</label>";

					echo "</div>";
					break;

				case 5:
					echo "<h3 class=\"preg\">".$i.": Característica de las computadoras de esta generación</h3>";

					echo "<div class=\"resp\">";
					
					echo "<input type=\"radio\" name=\"pre5\" value=\"true\" id=\"pre5_1\"/>";
					echo "<label for=\"pre5_1\">Procesaban la información con tubos de vació</label>";

					echo "<input type=\"radio\" name=\"pre5\" value=\"false\" id=\"pre5_2\"/>";
					echo "<label for=\"pre5_2\">Introducian programas con interfaces gráficas</label>";

					echo "<input type=\"radio\" name=\"pre5\" value=\"false\" id=\"pre5_3\"/>";
					echo "<label for=\"pre5_3\">Eran de costo muy bajo</label>";

					echo "</div>";
					break;

				case 6:
					echo "<h3 class=\"preg\">".$i.": ¿Qué marca de computadoras dominaba en este periodo?</h3>";

					echo "<div class=\"resp\">";
					
					echo "<input type=\"radio\" name=\"pre6\" value=\"false\" id=\"pre6_1\"/>";
					echo "<label for=\"pre6_1\">Microsoft</label>";

					echo "<input type=\"radio\" name=\"pre6\" value=\"true\" id=\"pre6_2\"/>";
					echo "<label for=\"pre6_2\">IBM</label>";

					echo "<input type=\"radio\" name=\"pre6\" value=\"false\" id=\"pre6_3\"/>";
					echo "<label for=\"pre6_3\">Apple</label>";

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
		setcookie('examen', "Examen 1")
	 ?>
	</div>

	<div class="butDis"><button class="final">Finalizar</button></div>

</body>
</html>