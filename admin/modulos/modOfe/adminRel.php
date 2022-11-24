<?php
	include("../../../connection.php");
	$id = $_POST["id"];
	
    $sql = "SELECT C.id_curso, C.nombre FROM cursos C INNER JOIN rel_ofcu RO ON C.id_curso = RO.id_c INNER JOIN ofertas O ON O.id_o = RO.id_o WHERE C.estado = 0 AND C.eliminado = 0 AND O.id_o = $id";
    $sqlEX = mysqli_query($connection, $sql);

	$json=array();
	while ($row = mysqli_fetch_array($sqlEX)) {
		$json[]=array(
			'nombre' => $row['nombre'],
            'id' => $row['id_curso']
		);
	};
	
	$json_string=json_encode($json);
	echo $json_string;
?>