<?php
include("../modCursos/db.php");
$id = $_POST['id'];
$nuevaFecha = $_POST['nuevaFecha'];

$sql = "UPDATE `ofertas` SET `fecha` = '$nuevaFecha' WHERE `id_o` = '$id'";
$sqlEX = mysqli_query($connection, $sql);

if ($sqlEX) {
    $json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;
}
?>