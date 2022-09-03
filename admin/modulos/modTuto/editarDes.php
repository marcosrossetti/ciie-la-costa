<?php
include("../../../connection.php");
$id = $_POST["id"];
$nuevaDes = $_POST["nuevaDes"]; 

$sql = "UPDATE `tutoriales` SET `des` = '$nuevaDes' WHERE `id` = '$id' ";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
    $json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;
}
?>