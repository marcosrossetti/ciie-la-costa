<?php
include("../../../connection.php");

function deshabilitarOfe(){
    include('../../../connection.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM `ofertas` WHERE `id_o` = $id";
    $sqlEX = mysqli_query($connection, $sql);
    if($sqlEX){
        header("location:../../administrarOfertas.php");
    }
}

deshabilitarOfe();
?>