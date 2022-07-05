<?php
//funcion para conectar la base de datos con el archivo
	function conectame(){
		$usuario="root";
		$pass   ="";
		$server ="localhost";
		$base   ="ciie";
		$mysqli = new mysqli($server,$usuario,$pass,$base );
		
		if( mysqli_connect_errno() ){
			echo "Error".mysqli_connect_error();
			echo "error en la conexion con la base de datos";
			exit();

		}/*else{
			echo "Todo OK";
		}*/

		return $mysqli;
	}

?>
