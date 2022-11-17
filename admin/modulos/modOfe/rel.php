<?php
include("../../../connection.php");
    $id_o = $_POST['id'];
    $id_c = $_POST['valor'];


        $sql = "INSERT INTO `rel_ofcu`(`id`, `id_o`, `id_c`, `estado`) VALUES ('','$id_o','$id_c',1)";
        
        $sqlEX = mysqli_query($connection, $sql);
        if($sqlEX){
            header("location:../../administrarOfertas.php");
        }


?>