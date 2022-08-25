<?php
include('db.php');
error_reporting(0);
$id = $_GET['id'];
if(isset($id)) {
    //si id contiene algo, bajamos id para procesarlo
    
    $query = "DELETE FROM `formador` WHERE `id` = '$id'"; 
    $result = mysqli_query($connection, $query);
  
    if (!$result) {
      die('Query Failed.');
    }
    
    header("location:../../administrarFormador.php");  
  
  }
  


?>