<?php
include('../../connection.php'); 
$nombre = $_POST['nombre'];
$area = $_POST['area'];
$formador = $_POST['formador'];
$dia = $_POST['dia'];
$horario = $_POST['horario'];
$url = $_POST['url'];

$queryID="
SELECT * 
FROM formador
INNER JOIN cursos
ON cursos.formador = formador.nombre
WHERE cursos.formador = formador.nombre
";

$result = mysqli_query($connection, $queryID);

if ($result) {
    $fila = mysqli_fetch_array($result);
    // $id_f = $fila['id'];
    // echo $id_f;
}

$sql = "INSERT INTO `cursos`(`nombre`, `area`, `formador`, `dia`, `horario`, `link`) VALUES ('$nombre','$area','$formador','$dia','$horario','$url')";

$sqlEX = mysqli_query($connection, $sql);

if($sqlEX){
    $json = "1";
    $jsonStr = json_encode($json);
    echo $jsonStr;
}else{
    // echo "Error en la insercion de datos";
}



?>