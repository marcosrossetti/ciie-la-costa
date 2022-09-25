<?php
 include("db.php"); //BUSCADOR DE MATERIAL

 
$query = "SELECT * FROM formador WHERE 1";
$resultado2 = mysqli_query($connection, $query);
$fila2 = mysqli_fetch_assoc($resultado);
// echo '<script> alert("'.$fila['nombre'].'"); </script>'



 
?>