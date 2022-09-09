<?php

    include("db.php");
 
    $query = "SELECT * FROM `area` WHERE 1";
    $resultado = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($resultado);

 
?>