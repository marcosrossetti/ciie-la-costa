<?php
    include("../../connection.php");

    $tipo = $_POST['tipo'];

    switch ($tipo) {
        case 'oferta':
            $titulo = $_POST['tituloOferta'];
            $nivel = $_POST['nivel'];
            $fecha = $_POST['fecha'];
            $descripcion = $_POST['descripcion'];
            $sql = "INSERT INTO `ofertas`(`fecha`, `titulo`, `nivel`,`descripcion`) VALUES ('$fecha','$titulo','$nivel','$descripcion')";
            $result = mysqli_query($connection, $sql);
            break;
        
        case 'curso':
            # code...
            break;

        case 'formador':
            $nombreCompleto = $_POST['nombreCompleto'];
            $email = $_POST['email'];
            $dni = $_POST['dni'];
            $telefono = $_POST['telefono'];
            $sql = "INSERT INTO `formador`(`mail`, `tel`, `nombre`, `dni`, `estado`) VALUES ('.$email.','.$telefono.','.$nombreCompleto.','$dni','0')";
            $result = mysqli_query($connection, $sql);
            echo "si";
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