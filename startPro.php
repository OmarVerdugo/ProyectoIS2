<?php 
include('template/header.php'); 

?>


<link rel="stylesheet" type="text/css" href="css/start.css">

	 <section class="startPage">
		<div class="progreso">   
		  <ul><h3 class="titulo"><li>Bienvenido
	         	<?php 
	 			   $stmt = $conn->prepare("SELECT nombrePro FROM Profesores WHERE emailPro = :email");
	               $stmt->bindParam(':email',$_SESSION['user']);
	               $stmt->execute();
	               $nombre = $stmt->fetch(); 
	               $stmt->setFetchMode(PDO::FETCH_ASSOC);

	               echo $nombre['nombrePro'];

	               $conni = mysqli_connect("localhost", "root","","IS2COMHIS");


				   $query = "SELECT DISTINCT clase FROM Alumnos WHERE idProfe = ?";
				   $stmt = $conni->prepare($query);
				   $profe = getIdProfe();
				   $stmt->bind_param("i", $profe);
				   $stmt->execute();
				   $result = $stmt->get_result();

				   $clases = 1;
				   while ($row = $result->fetch_assoc()) 
				   {
					  divClase($row['clase']);
				   };  
	             ?>

		</div>

		</section>
	<form action="sesionCerrada.php" method="POST">
	<footer class="footer"><button id="logout">Cerrar sesión</button></footer>
</body>

</html>
