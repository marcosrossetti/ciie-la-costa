<?php
include("../../../connection.php");
$id = $_POST["id"];
$nuevoTitulo = strtoupper($_POST['nuevoTitulo']);
$nuevaDescripcion = $_POST['nuevaDescripcion'];
$nuevoEnlace = $_POST['nuevoEnlace'];
 

$sql = "UPDATE `tutoriales` SET `url`='".$nuevoEnlace."',`titulo`='".$nuevoTitulo."',`des`='".$nuevoEnlace."' WHERE `id` = '".$id."'";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
    $json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;
}
?>