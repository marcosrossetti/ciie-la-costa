<?php
include("../connection.php");

$sql = "SELECT * FROM `ofertas` WHERE `estado` = 0 AND `eliminado` = 0";
$sqlEX = mysqli_query($connection, $sql);

$row = mysqli_fetch_array($sqlEX);
foreach($sqlEX as $row){
$titulo = $row['titulo'];
$fecha = $row['fecha'];
$descripcion = $row['descripcion'];
$nivel = $row['nivel'];

$json[] = array(
    'titulo' => $row['titulo'],
    'fecha' => $row['fecha'],
    'descripcion' => $row['descripcion'],
    'nivel' => $row['nivel'],
    'id' => $row['id_o']
    
  );
//compimimos el array para devolverlo en ajax


}
$jsonstring = json_encode($json);
echo $jsonstring;


?>