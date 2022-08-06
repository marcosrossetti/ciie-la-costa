<?php
function editarFormador(){
include('../../connection.php');
    $submitBtn = $_POST['submitF'];
    if(isset($submitBtn)){
$nuevoF = strtoupper($_POST['nuevoF']);
$id = $_GET['id'];
$sql = "UPDATE `cursos` SET `formador` = '$nuevoF' WHERE `id_curso` = '$id'  ";
$sqlEX = mysqli_query($connection,$sql);
if($sqlEX){
    header("location:../administrarOfertas.php");
}
}
}

function editarHorario(){
    include('../../connection.php');
        $submitBtn = $_POST['submitH'];
        if(isset($submitBtn)){
            $nuevoH = $_POST['nuevoH'];
                $id = $_GET['id'];
                $sql = "UPDATE `cursos` SET `horario` = '$nuevoH' WHERE `id_curso` = '$id'  ";
                $sqlEX = mysqli_query($connection,$sql);
                if($sqlEX){
            header("location:../administrarOfertas.php");
                }
        }
}

function editarDia(){
    include('../../connection.php');
        $submitBtn = $_POST['submitD'];
        if(isset($submitBtn)){
            $nuevoD = $_POST['nuevoD'];
                $id = $_GET['id'];
                $sql = "UPDATE `cursos` SET `dia` = '$nuevoD' WHERE `id_curso` = '$id'  ";
                $sqlEX = mysqli_query($connection,$sql);
                if($sqlEX){
            header("location:../administrarOfertas.php");
                }
        }
}

function deshabilitarCurso(){
    include('../../connection.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM `cursos` WHERE `id_curso` = '$id'";
    $sqlEX = mysqli_query($connection, $sql);
    if($sqlEX){
        header('location:../administrarOfertas.php');
    }
}

function agregarCurso(){
    include('../../connection.php'); 
    $nombre = $_POST['nombre'];
    $area = $_POST['area'];
    $formador = $_POST['formador'];
    $dia = $_POST['dia'];
    $horario = $_POST['horario'];
    $url = $_POST['url'];
    $descripcion = $_POST['descripcion'];
    $sql = "INSERT INTO `cursos`(`nombre`, `area`, `formador`, `dia`, `horario`, `url`, `descripcion`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')";
}


?>