<?php
include("../../../connection.php");
$nuevoFor = $_POST['nuevoFor'];
$id = $_POST['id'];


$sql = "UPDATE `cursos` SET `formador` = '$nuevoFor' WHERE `id_curso` = '$id'";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
   $json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;

}
?>