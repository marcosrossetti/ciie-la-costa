<?php
include("../../../connection.php");
$id = $_POST['id'];

$sql = "DELETE FROM `contacto` WHERE `id` = '$id'";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
    $json = "1";
   $jsonStr = json_encode($json);
   echo $jsonStr;
}
?>