<?php
include("../../../connection.php");
$id = $_POST["id"];
$nuevoDia = $_POST["nuevoDia"]; 

$sql = "UPDATE `cursos` SET `dia` = '$nuevoDia' WHERE `id_curso` = '$id' ";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
    $json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;
}
?>