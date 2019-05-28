
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
  include('funcs.php');
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
                  //imprime el nombre del usuario de la sesion 
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
                      
                      # //  si no se encuentra en alumnos, se imprime un campo vacio y se busca en profesores
                      $stmt = $conn->prepare("SELECT nombrePro, apePatPro FROM Profesores WHERE emailPro = :email");
                      $stmt->bindParam(':email',$user);
                      $stmt->execute();
                      $nombre = $stmt->fetch();
                      echo "<a href='#'>".$nombre['nombrePro']." ".$nombre['apePatPro']."</a>";   
                      # //  si no se encuentra en profesores se imprime un campo vacio y solo se ve reflejado el nombre del Alumnos
                   }
                  ?>
            </li>
           	<ul>
           		
              <?php 
              if (!isset($_SESSION['user'])) 
              {
                echo "<li><a href=\"http://localhost/ProyectoIS2/index.php#\">INICIO</a></li>";
              }else{
                  if (esProfe()) {
                    echo "<li><a href=\"http://localhost/ProyectoIS2/startPro.php#\">INICIO</a></li>";
                  }else
                    {
                      echo "<li><a href=\"http://localhost/ProyectoIS2/startAlu.php#\">INICIO</a></li>";
                    } 
                }
               ?>
             
           		<li><?php 
                if (isset($_SESSION['user'])) 
                {
                 echo "<a href=\"http://localhost/ProyectoIS2/menuCapitulos.php#\">CAPÍTULOS</a>"; 
                }else{
                  echo "<a href=\"#\">CAPÍTULOS</a>";
                }?>
              </li>
           		<li><?php 
                if (isset($_SESSION['user']) and getIdProfe($_SESSION['user']) == null ) 
                {
                 echo "<a href=\"http://localhost/ProyectoIS2/EVALUACIONES.php#\">EVALUACIONES</a>"; 
                }else{
                  echo "<a href=\"#\">EVALUACIONES</a>";
                }
               ?></li>
           		<li><?php 
                if (isset($_SESSION['user']) ) 
                {
                 echo "<a href=\"http://localhost/ProyectoIS2/Juegos.php#\">JUEGOS</a>"; 
                }else{
                  echo "<a href=\"#\">JUEGOS</a>";
                }

               ?></li>
           		<li><a 
                <?php  
                 if (isset($_SESSION['user'])) 
                 {
                    if (esProfe()) {
                      echo "href='http://localhost/ProyectoIS2/menuControlPro.php#'";
                    }else{
                      echo "href='http://localhost/ProyectoIS2/menuControlAlu.php#'";                    
                    }
                } 
                ?>">ADMINISTRAR
              </a></li>
           		
           	</ul>
           </nav>
  </header>
  