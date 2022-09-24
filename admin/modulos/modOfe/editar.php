<?php
include("../modCursos/db.php");
$id = $_POST['id'];
$nuevaFecha = $_POST['nuevaFecha'];
$nuevoTitulo = $_POST['nuevoTitulo'];
$nuevoNivel = $_POST['nuevoNivel'];
$nuevaDescripcion = $_POST['nuevaDescripcion'];

$sql = "UPDATE `ofertas` SET `fecha`='".$nuevaFecha."',`titulo`='".$nuevoTitulo."',`nivel`='".$nuevoNivel."',`descripcion`='".$nuevaDescripcion."' WHERE `id_o` = '".$id."' ";
$sqlEX = mysqli_query($connection, $sql);

if ($sqlEX) {
    $json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;
}
    
?>