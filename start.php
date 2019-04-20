<?php include('template/header.php'); ?>

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
			<li><strong>Capitulo 1 <meter min="0" max="100" low="26" high="75" optimum="100" value="50"></strong></li>
			<li><strong>Capitulo 2 <meter min="0" max="100" low="26" high="75" optimum="100" value="75"></strong></li>
			<li><strong>Capitulo 3 <meter min="0" max="100" low="26" high="75" optimum="100" value="75"></strong></li>
			<li><strong>Capitulo 4 <meter min="0" max="100" low="26" high="75" optimum="100" value="75"></strong></li>
			</div>
			<div style="float: right; width: 50%;">
			<li><strong>Capitulo 5 <meter min="0" max="100" low="26" high="75" optimum="100" value="75"></strong></li>
			<li><strong>Capitulo 6 <meter min="0" max="100" low="26" high="75" optimum="100" value="25"></strong></li>
			<li><strong>Capitulo 7 <meter min="0" max="100" low="26" high="75" optimum="100" value="75"></strong></li>
			<li><strong>Capitulo 8 <meter min="0" max="100" low="26" high="75" optimum="100" value="75"></strong></li>
			</div>


		</ul>
		</div>

		</section>
	<form action="sesionCerrada.php" method="POST">
	<footer class="footer"><button id="logout">Cerrar sesión</button></footer>

		


</body>

</html>