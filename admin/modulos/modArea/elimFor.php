<?php

include('db.php');

$id = $_POST['id'];
        $sql1 = "UPDATE `area` SET `eliminado`= 1 WHERE `id` = $id";
        $sqlEX1 = mysqli_query($connection, $sql1);
        if($sqlEX1){
            header("location:../../administrarFormador.php");
        }
?>