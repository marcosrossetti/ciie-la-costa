<?php
function editarFormador(){
include('../../../connection.php');
    $submitBtn = $_POST['submitF'];
    if(isset($submitBtn)){
$nuevoF = strtoupper($_POST['nuevoF']);
$id = $_GET['id'];
$sql = "UPDATE `cursos` SET `formador` = '$nuevoF' WHERE `id_curso` = '$id'  ";
$sqlEX = mysqli_query($connection,$sql);
if($sqlEX){
    header("location:../../administrarCursos.php");
}
}
}

function editarHorario(){
    include('../../../connection.php');
        $submitBtn = $_POST['submitH'];
        if(isset($submitBtn)){
            $nuevoH = $_POST['nuevoH'];
                $id = $_GET['id'];
                $sql = "UPDATE `cursos` SET `horario` = '$nuevoH' WHERE `id_curso` = '$id'  ";
                $sqlEX = mysqli_query($connection,$sql);
                
                if($sqlEX){
            header("location:../../administrarCursos.php");
           
                }
        }
}

function editarDia(){
    include('../../../connection.php');
        $submitBtn = $_POST['submitD'];
        if(isset($submitBtn)){
            $nuevoD = $_POST['nuevoD'];
                $id = $_GET['id'];
                $sql = "UPDATE `cursos` SET `dia` = '$nuevoD' WHERE `id_curso` = '$id'  ";
                $sqlEX = mysqli_query($connection,$sql);
                if($sqlEX){
            header("location:../../administrarCursos.php");
                }
        }
}

function deshabilitarCurso(){
    include('../../../connection.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM `cursos` WHERE `id_curso` = '$id'";
    $sqlEX = mysqli_query($connection, $sql);
    if($sqlEX){
        header('location:../../administrarCursos.php');
    }
}

function editarMes(){
    include('../../../connection.php');
    $submitBtn = $_POST['submitM'];
        if(isset($submitBtn)){
    $id = $_GET['id'];
    $mes_cursada = $_POST['nuevoM'];
    $sql = "UPDATE `cursos` SET `mes_cursada` = '$mes_cursada' WHERE `id_curso` = '$id'";
    $sqlEX = mysqli_query($connection, $sql);
    if($sqlEX){
        header('location:../administrarOfertas.php');
    }
}
}


//TUTORIALES

function deshabilitarTuto(){
    include('../../../connection.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM `tutoriales` WHERE `id` = $id";
    $sqlEX = mysqli_query($connection, $sql);
    if($sqlEX){
        header("location:../../administrarTutoriales.php");
    }
}

//OFERTAS




?>