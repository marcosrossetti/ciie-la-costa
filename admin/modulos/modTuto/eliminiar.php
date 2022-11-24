<?php
include("db.php");
    $id = $_POST['id'];

        $sql = "UPDATE `tutoriales` SET `eliminado`= 1 WHERE id = $id";
        $sqlEX = mysqli_query($connection, $sql);
        if($sqlEX){
            header("location:../../administrarTutoriales.php");
        }


?>