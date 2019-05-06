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
	
 ?>