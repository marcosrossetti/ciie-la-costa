<?php
include('../../../connection.php');

    $id = $_POST['id'];
    $est = $_POST['est'];
    if($est == 0){
        $sql = "UPDATE `formador` SET `estado`= 1 WHERE `id` = $id";
        $sqlEX = mysqli_query($connection, $sql);
        if($sqlEX){
            header("location:../../administrarFormador.php");
        }
    } elseif ($est == 1){
        $sql = "UPDATE `formador` SET `estado`= 0 WHERE `id` = $id";
        $sqlEX = mysqli_query($connection, $sql);
        if($sqlEX){
            header("location:../../administrarFormador.php");
        }
    }



?>