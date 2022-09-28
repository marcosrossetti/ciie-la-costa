
<?php
//seguridad de redireccionamiento
session_start();
include('modulos/segUrl.php');
destroyAdmin();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- LINKS FUENTES Y FONT AWESOME-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- LINK CSS PLANTILLA -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- LINKS DATA TABLES -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <title>ADMIN - CIIE La Costa</title>

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- INCLUDE MODULO SIDEBAR -->
        <?php include("modulos/sidebar.php") ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="row m-0 mb-3" style="background-color:#fff"> 
                    <h1 class="pl-3 pt-3 h3 mb-4 text-gray-800">Administrar cursos</h1>
                </div>  
                <div class="container-fluid">

                    <!-- BOTON ACORDEON -->
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header p-0" id="headingOne">
                                <h2 class="mb-0">
                                <button class="btn btn-primary btn-block text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Agregar cursos
                                </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="agregar">
                                        <div class="form-group">
                                            <label>Area</label>
                                            <select id="area" name="area">
                                                <?php include("modulos/modCursos/buscarArea.php");
                                                    foreach($resultado as $row){
                                                        $nmb = $row['nombre'];
                                                        
                                                        echo '<option value="'.$nmb.'">  '.$nmb.' </option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre del curso</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Formadores Disponibles</label>
                                            <select id="formador">
                                                <?php include("modulos/modCursos/buscarFormador.php");
                                                    foreach($resultado2 as $fila2){
                                                        $nombre = $fila2['nombre'];
                                                            
                                                        echo '<option value="'.$nombre.'">  '.$nombre.' </option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Dia</label>
                                            <select name="dia" id="dia" class="form-control">
                                                <option value="lunes">Lunes</option>
                                                <option value="martes">Martes</option>
                                                <option value="miercoles">Miercoles</option>
                                                <option value="jueves">Jueves</option>
                                                <option value="viernes">Viernes</option>
                                                <option value="sabado">Sabado</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Horario</label>
                                            <input type="time" name="horario" id="horario" class="form-control" rows="3" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Enlace del Curso</label>
                                            <input type="text" name="url" id="url" class="form-control" rows="3" required></input>
                                        </div>                    
                                        <button type="submit" id="submitA" name="submitA" class="btn btn-primary">Cargar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- TABLA -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Area</th>
                                            <th>Dia</th>
                                            <th>Horario</th>
                                            <th>Formador</th>
                                            <th>Enlace</th>
                                            <th>Estado</th>
                                            <th>Mantenimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include('../connection.php');

                                            include("modulos/modCursos/buscarFormador.php");

                                            foreach($resultado2 as $fila2){
                                                $nombre2 = $fila2['nombre'];

                                                $template = '
                                                <option value="'.$nombre2.'">'.$nombre2.'</option>';
                                            }

                                            $sql = "SELECT * FROM `cursos` WHERE 1";
                                            $sqlEX = mysqli_query($connection, $sql);
                                            if($sqlEX){
                                                $row = mysqli_fetch_array($sqlEX);

                                                foreach($sqlEX as $row){

                                                    $query = "SELECT * FROM formador WHERE 1";
                                                    $resultado = mysqli_query($connection, $query);
                                                    $fila = mysqli_fetch_assoc($resultado);

                                                    $id = $row['id_curso'];
                                                    $formador = $row['formador'];
                                                    $dia = $row['dia'];
                                                    $horario = $row['horario'];

                                                    echo "<tr>";
                                                    echo '<td>' .$row['nombre'] . '</td>';
                                                    echo '<td>' .$row['area'] . '</td>';
                                                    echo '<td>'.$row["dia"].'</td>';
                                                    echo '<td>'.$row["horario"].'</td>';
                                                    echo '<td>'.$row["formador"].'</td>';
                                                    echo '<td>' .'<a href='. $row['link'] .'>Ver</a>' . '</td>';
                                                    echo '<td> prueba </td>';
                                                    echo '<td class="text-center">' . '<button class="btn btn-primary" title="Editar datos" data-toggle="modal" id="editarBtn" data-id="'.$id.'"><i class="fa-solid fa-pen-to-square"></i></button> <button class="btn btn-danger" title="Editar estado"><i class="fa-solid fa-person-arrow-down-to-line"></i></button> <button class="btn btn-danger" title="Eliminar"><a style="color:white; text-decoration:none" href="modulos/modCursos/deshabilitarCurso.php?id='.$id.'"><i class="fa-solid fa-eraser"></i></a></button>' . '</td>';
                                                    echo "</tr>";
                                                    echo '
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form id="idForm">
                                                                    <div class="modal-body">
                                                                        <input type="text" id="nuevoNombre" placeholder="Nombre del curso" class="form-control mb-2" required>
                                                                        <input type="number" id="nuevaArea" placeholder="Area" class="form-control mb-2" required>
                                                                        <input type="date" id="nuevoDia" placeholder="Dia" class="form-control mb-2" required>
                                                                        <input type="time" id="nuevoHorario" placeholder="Horario" class="form-control mb-2" required>
                                                                        <select id="nuevoFormador" class="form-control mb-2">
                                                                            '.  $template .'
                                                                        </select>
                                                                        <input type="text" id="nuevoEnlace" placeholder="Enlace" class="form-control mb-2" required>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                                            <button type="button" class="btn btn-primary">Guardar cambios</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ';   
                                                }
                                            }
                                        ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- INCLUDE MODULO FOOTER -->
            <?php include('modulos/footer.php'); ?>

        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>

       $(document).on('click','#editarBtn',function (){
                     let id = $(this).data('id');
                     console.log(id);


                    $("#exampleModal").modal("show");

                    $('#idForm').submit(e => {
                    e.preventDefault();
                    $(document).on('click','#submit', function (){

                    //creacion de objeto de almacenamiento de los inputs "postData"
                    const postData = {
                    //guardamos los input dentro de un objeto
                    nuevaFecha : $("#nuevaFecha").val(),
                    id : id,
                    nuevoTitulo : $("#nuevoTitulo").val(),
                    nuevoNivel : $("#nuevoNivel").val(),
                    nuevaDescripcion : $("#nuevaDescripcion").val()
                    };
                    //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                    const url = "modulos/modOfe/editar.php";
                    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                    console.log(postData, url);
                    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                    //procesamiento de dichos datos)
                    $.post(url, postData, (response) => {
                        

                        const rta = JSON.parse(response);
                    console.log(rta);
                    if(rta == 1){
                        window.location = "administrarOfertas.php";
                    }

                    
                    
                    });
                    });
                    
                });   

                   }); 

    </script>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    

    <!-- SCRIPTS DATA TABLE Y TRADUCCION -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="modulos/funciones.js"></script>
    

</body>

</html>