<?php 
	session_start();
	include_once('db/DB.php');
	include('funcs.php');

	$nombrePro= $_POST['_nombrePro'];
	$apePatPro = $_POST['_apePatPro'];
	$apeMatPro = $_POST['_apeMatPro'];
	$naciPro = $_POST['_naciPro'];
	$sexoPro = $_POST['_sexoPro'];
	$emailPro = $_POST['_emailPro'];
	$pass2 = $_POST['_pass2'];
	$pass1 = $_POST['_pass1'];

	if ( $nombrePro != "" or $apePatPro != "" or $apeMatPro != "" or $sexoPro != "" or $emailPro != "" ) 
		{
			$pdo = new PDO('mysql:host=localhost;dbname=IS2COMHIS', 'root', '');
			$db = new DB();		
			$conn = $db->getConnection();
				
			 #	//	verifica si ese email ya esta registrado en la base de datos   //
		    $query ="SELECT idProfe FROM Profesores WHERE emailPro=:email";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':email', $emailPro);
			$stmt->execute();
		    $existencia = $stmt->fetch();
			
			if (!isset($existencia['idProfe']) and $pass1 == $pass2) 
			{
				
				#	//	inserta el profe en la base de datos   //
				$query ="INSERT INTO Profesores VALUES('0', :nombre,:apepat,:apemat,:naci,:sexo,:email,:pass)";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(':nombre', $nombrePro);
				$stmt->bindParam(':apepat', $apePatPro);
				$stmt->bindParam(':apemat', $apeMatPro);
				$stmt->bindParam(':naci', $naciPro);
				$stmt->bindParam(':sexo', $sexoPro);
				$stmt->bindParam(':email', $emailPro);
				$stmt->bindParam(':pass', $pass1);
				$stmt->execute(); 				
				$_SESSION['user'] = $emailPro;
				mandarEmail($emailPro);
				header('location:startPro.php'); 
				}else
					{
						?>
						<script>
							alert("Profesor ya registrado o no coinciden contraseñas");
							window.location.href=('CrearProfe.php');		
						</script>
						<?php
					}
		}else
			{
				?>
				<script>
					alert("Faltan campos");
					window.location.href=('CrearProfe.php');		

				</script>
				<?php
			}

	?>