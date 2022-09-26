<?php
include("../modCursos/db.php");
$id = $_POST['id'];
$nuevoNombre = strtoupper($_POST['nuevoNombre']);

$sql = "UPDATE `area` SET `nombre`='".$nuevoNombre."' WHERE `id`= '".$id."'";
$sqlEX = mysqli_query($connection, $sql);

if ($sqlEX) {
    $json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;
}
    
?>