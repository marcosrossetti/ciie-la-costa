<?php
include('../../connection.php'); 
$nombre = $_POST['nombre'];
$area = $_POST['area'];
$formador = $_POST['formador'];
$dia = $_POST['dia'];
$horario = $_POST['horario'];
$url = $_POST['url'];
$descripcion = $_POST['descripcion'];
$nivel = $_POST['nivel'];
$mes_cursada = $_POST['mes_cursada'];

$sql = "INSERT INTO `cursos`(`nombre`, `area`, `formador`, `dia`, `horario`, `url`, `descripcion`,`nivel`,`mes_cursada`) VALUES ('$nombre','$area','$formador','$dia','$horario','$url','$descripcion','$nivel', '$mes_cursada')";

$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
    echo "Curso Guardado";
}else{
    echo "Error en la insercion de datos";
}



?>