<?php

include('../../../connection.php');

$id = $_POST['id'];
        $sql1 = "UPDATE `cursos` SET `eliminado`= 1 WHERE `id_curso` = $id";
        $sqlEX1 = mysqli_query($connection, $sql1);
        if($sqlEX1){
            header("location:../../administrarCursos.php");
        }
?>