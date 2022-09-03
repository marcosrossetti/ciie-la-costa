<?php
include("../connection.php");

$sql = "SELECT * FROM `tutoriales` WHERE 1";
$sqlEX = mysqli_query($connection, $sql);

$row = mysqli_fetch_array($sqlEX);
foreach($sqlEX as $row){
$id = $row['id'];
$url = $row['url'];
$titulo = $row['titulo'];
$des = $row['des'];

$json[] = array(

    'id' => $id,
    'url' => $url,
    'titulo' => $titulo,
    'des' => $des
    
    
  );
//compimimos el array para devolverlo en ajax


}
$jsonstring = json_encode($json);
echo $jsonstring;


?>