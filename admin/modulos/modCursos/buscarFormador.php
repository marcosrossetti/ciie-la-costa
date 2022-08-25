<?php
 include("db.php"); //BUSCADOR DE MATERIAL

 
$query = "SELECT * FROM formador WHERE 1";
$resultado = mysqli_query($connection, $query);
$fila = mysqli_fetch_assoc($resultado);
// echo '<script> alert("'.$fila['nombre'].'"); </script>'
foreach($resultado as $fila){
    $nombre = $fila['nombre'];
}


 
?>