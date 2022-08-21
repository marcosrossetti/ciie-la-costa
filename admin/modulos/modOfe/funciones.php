<?php
function editarFecha(){
    include("../../../connection.php");
    $id = $_GET['id'];
    $fecha = $_POST['fecha'];
    $submitBtn = $_POST['submitF'];

    if(isset($submitBtn)){
        echo $fecha;

    $sql = "UPDATE `ofertas` SET `fecha` = '$fecha' WHERE `id_o` = '$id' ";
    $sqlEX = mysqli_query($connection, $sql);
    if($sqlEX){
        header("location:../../administrarOfertas.php");
    }
}
    
    
}
?>