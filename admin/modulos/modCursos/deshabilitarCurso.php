<?php
include('../../../connection.php');

    $id = $_POST['id'];
    $est = $_POST['est'];
    if($est == 0){
        $sql = "UPDATE `cursos` SET `estado`= 1 WHERE `id_curso` = $id";
        $sqlEX = mysqli_query($connection, $sql);
        if($sqlEX){
            header("location:../../administrarOfertas.php");
        }
    } elseif ($est == 1){
        $sql = "UPDATE `cursos` SET `estado`= 0 WHERE `id_curso` = $id";
        $sqlEX = mysqli_query($connection, $sql);
        if($sqlEX){
            header("location:../../administrarOfertas.php");
        }
    }



?>