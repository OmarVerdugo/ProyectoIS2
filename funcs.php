<?php 

//consigue la id del alumno 
function getIdAlumno(){
	$db = new DB();
 	$conn = $db->getConnection();
	$stmt = $conn->prepare("SELECT idAlumno FROM Alumnos WHERE emailAlu = :email");
 	$stmt->bindParam(':email',$_SESSION['user']);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$alu = $stmt->fetch();              

	return $alu['idAlumno'];
}
//consigue la id del profesor
function getIdProfe(){
	$db = new DB();
 	$conn = $db->getConnection();
	$stmt = $conn->prepare("SELECT idProfe FROM Profesores WHERE emailPro = :email");
 	$stmt->bindParam(':email',$_SESSION['user']);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$profe = $stmt->fetch();              

	return $profe['idProfe'];
}
//consigue la calificacion de un capitulo 
function getCalif($capitulo){
	$db = new DB();
 	$conn = $db->getConnection();
  	$user = $_SESSION['user'];
	$stmt = $conn->prepare("SELECT califExam FROM CalifExam WHERE tituloExam = :capitulo AND idAlumno = :alumno");
	$idAlu = getIdAlumno();
 	$stmt->bindParam(':alumno',$idAlu);
 	$stmt->bindParam(':capitulo',$capitulo);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$cal = $stmt->fetch();              

	return $cal['califExam'];
}
//imprime la calificacion de un capitulio en la pagina de inicio de los alumnos
function printMeter($capitulo, $label){
	echo "<li><strong>".$label ."<meter min=\"0\" max=\"100\" low=\"26\" high=\"75\" optimum=\"100\" value=\"". getCalif($capitulo)."\"></strong></li>";
}
//comfirma si el usuario es un profesor o un alumno
function esProfe(){
	$db = new DB();
 	$conn = $db->getConnection();
	$stmt = $conn->prepare("SELECT idProfe FROM Profesores WHERE emailPro = :email");
	$stmt->bindParam(':email',$_SESSION['user']);
    $stmt->execute();
    $existencia = $stmt->fetch();
    if (isset($existencia['idProfe'])) {
      return true;
    }else{
      return false;                   
    }
}
//imprime los alumnos y sus promedios en la pagina de inicio de un profesor
function divClase($clase){


	echo "<div class=\"clasesAlu\">";
	echo 	"<h3>Grupo ". $clase ."</h3>";
	
	echo 	"<div class=\"clasesCont\">";

			   $conni = mysqli_connect("localhost", "root","","IS2COMHIS");
			   $query = "SELECT nombreAlu, apePatAlu, promedio FROM Alumnos WHERE idProfe = ? AND clase = ?";
			   $stmt = $conni->prepare($query);
			   $profe = getIdProfe();
			   $stmt->bind_param("is", $profe, $clase);
			   $stmt->execute();
			   $result = $stmt->get_result();

			   $promedio = 0;
			   $alumnos = 0;
			   while ($row = $result->fetch_assoc()) 
			   {
				 echo "<br>".$row['nombreAlu']." ".$row['apePatAlu'] ." Promedio: ".round($row['promedio'],1);
				 $promedio += round($row['promedio'],1);
				 $alumnos++; 
			   };

		echo "</div>";
		echo "<br>Promedio del grupo: ".round(	($promedio / $alumnos) , 1);
	echo "</div>";
}
//calcula el promedio de los alumnos a partir de las calificaciones de sus examenes
function actualPromedio($calif){
	
	$alu=getIdAlumno();

	$db = new DB();
 	$conn = $db->getConnection();
	$stmt = $conn->prepare("SELECT promedio FROM Alumnos WHERE idAlumno = :alumno");
	$stmt->bindParam(':alumno',$alu);
    $stmt->execute();
    $prom = $stmt->fetch();

	$promedio = ($calif + $prom['promedio'] ) / 8;

	$stmt = $conn->prepare("UPDATE Alumnos 
							SET promedio = :promedio 
							WHERE idAlumno = :alumno");
	$stmt->bindParam(':alumno',$alu);
	$stmt->bindParam(':promedio',$promedio);
    $stmt->execute();
    

}

function mandarEmail($email)
{
	mail($email, "Registro en CHSys", "Has sido registrado en la CHSys!");
}


 ?>