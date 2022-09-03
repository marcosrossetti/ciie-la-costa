<?php
include("../connection.php");
$nombre = strtoupper($_POST['nombre']);
$email = $_POST['email'];
$tel = $_POST['tel'];
$message = $_POST['message'];

$sql = "INSERT INTO `contacto`(`nombre`, `email`, `telefono`, `mensaje`) VALUES ('$nombre','$email','$tel','$message')";
$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
    $json = "1";
    $jsonStr = json_encode($json);
    echo $jsonStr;
}

?>