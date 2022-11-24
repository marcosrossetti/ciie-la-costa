<?php
include("../../../connection.php");
    $id = $_POST['id'];


        $sql = "UPDATE `rel_ofcu` SET `estado` = 0 WHERE `id` = $id";
        
        $sqlEX = mysqli_query($connection, $sql);
        if($sqlEX){
            header("location:../../administrarOfertas.php");
        }


?>