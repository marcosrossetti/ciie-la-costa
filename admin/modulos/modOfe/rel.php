<?php
include("../../../connection.php");
    $id_o = $_POST['id'];
    $id_c = $_POST['valor'];

    $sql = "SELECT * FROM `rel_ofcu` WHERE `id_o` = $id_o AND `id_c` = $id_c AND `estado` = 1";
    $sqlEX = mysqli_query($connection, $sql);
    $cant = mysqli_num_rows($sqlEX);

    if ($cant == 0) {
        $sql1 = "INSERT INTO `rel_ofcu`(`id`, `id_o`, `id_c`, `estado`) VALUES ('','$id_o','$id_c',1)";
        $sqlEX1 = mysqli_query($connection, $sql1);

        if($sqlEX1){
            $json = "0";
            $json_string = json_encode($json);
            echo $json_string;
        }
        
    } else {
        $json = "1";
        $json_string = json_encode($json);
        echo $json_string;


    }

        


?>