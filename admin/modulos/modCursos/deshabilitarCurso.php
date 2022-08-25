<?php
include('../../../connection.php');
$id = $_GET['id'];
if(isset($id)) {
    //si id contiene algo, bajamos id para procesarlo
    
    $query = "DELETE FROM `cursos` WHERE `id_curso` = '$id'"; 
    $result = mysqli_query($connection, $query);
  
    if (!$result) {
      die('Query Failed.');
    }
    
    header("location:../../administrarCursos.php");  
  
  }
  


?>