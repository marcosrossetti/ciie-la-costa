<?php
include("../modCursos/db.php");
$id = $_POST['id'];
$nuevoNombre = $_POST['nuevoNombre'];
$nuevoDni = $_POST['nuevoDni'];
$nuevoEmail = $_POST['nuevoEmail'];
$nuevoTelefono = $_POST['nuevoTelefono'];

$sql = "UPDATE `formador` SET `mail`='".$nuevoEmail."',`tel`='".$nuevoTelefono."',`nombre`='".$nuevoNombre."',`dni`='".$nuevoDni."' WHERE `id`= '".$id."' ";
$sqlEX = mysqli_query($connection, $sql);

if ($sqlEX) {
    $json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;
}
    
?>