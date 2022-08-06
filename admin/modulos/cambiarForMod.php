<?php
include('../../connection.php');
$nuevoF = $_POST['nuevoF'];
$id = $_GET['id'];
$sql = "UPDATE `cursos` SET `formador` = '$nuevoF' WHERE `id_curso` = '$id'  ";
$sqlEX = mysqli_query($connection,$sql);
if($sqlEX){
    header("location:../administrarOfertas.php");
}
?>