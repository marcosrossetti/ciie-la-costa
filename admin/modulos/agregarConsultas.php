<?php
    include("../../connection.php");

    $tipo = $_POST['tipo'];

    switch ($tipo) {
        case 'oferta':
            # code...
            break;
        
        case 'curso':
            # code...
            break;

        case 'formador':
            # code...
            break;
        
        case 'area':
            # code...
            break;

        case 'tutorial':
            $titulo = $_POST['titulo'];
            $desc = $_POST['desc'];
            $url = $_POST['url'];

            $query = "INSERT INTO `tutoriales`(`titulo`, `des`, `url`) VALUES ('$titulo', '$desc', '$url')";
            break;
        
        default:
            # code...
            break;
    }

    mysqli_query($connection, $query);
    $error = mysqli_error($connection);
    echo $error ? '0' : '1';

?>