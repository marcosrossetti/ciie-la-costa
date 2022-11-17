<?php
include("../../../connection.php");
    $id = $_POST['id'];

        $sql = "UPDATE `ofertas` SET `eliminado`= 1 WHERE id_o = $id";
        $sqlEX = mysqli_query($connection, $sql);
        if($sqlEX){
            header("location:../../administrarOfertas.php");
        }


?>