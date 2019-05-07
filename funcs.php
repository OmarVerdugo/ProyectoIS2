<?php 

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

function printMeter($capitulo, $label){
	echo "<li><strong>".$label ."<meter min=\"0\" max=\"100\" low=\"26\" high=\"75\" optimum=\"100\" value=\"". getCalif($capitulo)."\"></strong></li>";
}

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


 ?>