<?php
include("../../../connection.php");
$id = $_POST["id"];
$nuevoHorario = $_POST['nuevoHorario'];

$sql = "UPDATE `cursos` SET `horario` = '$nuevoHorario' WHERE `id_curso` = '$id'";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
    $json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;
}
?>