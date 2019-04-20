
<?php /*
***********************************************************************
Nombre del proyecto: Apliacion web, historia de las computadoras
Descripción:    Página web educativa acerca de la historia de las computadoras
Autores:  Morales Inzunza Jose R., Verdugo Amcriz Omar D.
Versión:    1.00 lanzada el 25 de Abril de 2019
Institución:    Universidad Autónoma de Baja California Sur
Lugar:      La Paz, México
**********************************************************************
*/ 

  include_once('db/DB.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/style.css">



</head>
  
  
<body>
  <header class="main-header">
           <nav class="main-menu">
            <li id="login" name="loginLabel">
                <?php 
                 session_start(); 
                  if (!isset($_SESSION['user'])) {
                    echo "<a href='#'> </a>";
                  }else
                    {
                      $db = new DB();
                      $conn = $db->getConnection();
                      $user = $_SESSION['user'];
                      $stmt = $conn->prepare("SELECT nombreAlu, apePatAlu FROM Alumnos WHERE emailAlu = :email");
                      $stmt->bindParam(':email',$user);
                      $stmt->execute();
                      $stmt->setFetchMode(PDO::FETCH_ASSOC);

                      $nombre = $stmt->fetch();
                      
                        
                        echo "<a href='#'>".$nombre['nombreAlu']. " ".$nombre['apePatAlu']."</a>";
                        $stmt = $conn->prepare("SELECT nombrePro, apePatPro FROM Profesores WHERE emailPro = :email");
                        $stmt->bindParam(':email',$user);
                        $stmt->execute();
                        $nombre = $stmt->fetch();
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        echo "<a href='#'>".$nombre['nombrePro']." ".$nombre['apePatPro']."</a>";   
                   }
                  ?>
            </li>
           	<ul>
           		<li><a href="http://localhost/ProyectoIS2/start.php#">INICIO</a></li>
           		<li><a href="#">CAPÍTULOS</a></li>
           		<li><a href="http://localhost/ProyectoIS2/evaluaciones.php#">EVALUACIONES</a></li>
           		<li><a href="http://localhost/ProyectoIS2/juegos.php#">JUEGOS</a></li>
           		<li><a href="#">ADMINISTRAR</a></li>
           		
           	</ul>
           </nav>
  </header>
  