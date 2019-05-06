<?php 
include('template/header.php'); 

?>

<link rel="stylesheet" type="text/css" href="css/start.css">

	 <section class="startPage">
		<div class="progreso">   
		  <ul><h3 class="titulo"><li>Bienvenido
	         	<?php 
	         				$stmt = $conn->prepare("SELECT nombreAlu FROM Alumnos where emailAlu = :email");
	                        $stmt->bindParam(':email',$user);
	                        $stmt->execute();
	                        $nombre = $stmt->fetch(); 
	                        $stmt->setFetchMode(PDO::FETCH_ASSOC);

	                        echo $nombre['nombreAlu']?>
	                        </li></h3>
				<h3 class="titulo"><li>Progreso del curso.</li></h3>
				<div style="float: left; width: 50%;">
					<?php  
						printMeter('examen 1');
						printMeter('examen 2');
						printMeter('examen 3');
						printMeter('examen 4');
							
					?>
				</div>
				<div style="float: right; width: 50%;">
					<?php 
						printMeter('examen 5');
						printMeter('examen 6');
						printMeter('examen 7');
						printMeter('examen 8');
					?>
				</div>

			</ul>
		</div>

		</section>
	<form action="sesionCerrada.php" method="POST">
	<footer class="footer"><button id="logout">Cerrar sesión</button></footer>
</body>

</html>

