
<?php
//seguridad de redireccionamiento
session_start();
include('modulos/segUrl.php');
destroyAdmin();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN - CIIE La Costa</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <?php include("modulos/slidebar.php") ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <div class="row m-0 mb-3" style="background-color:#fff"> 
                    <h1 class="pl-3 pt-3 h3 mb-4 text-gray-800">Administrar cursos</h1>
                </div>  

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    

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
                                            <input type="text" name="area" id="area" class="form-control" rows="3" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre del curso</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Formadores Disponibles</label>
                                            <!-- <input type="text" name="formador" id="formador" class="form-control" rows="3" required></input> -->
                                            <select id="formador">
                                                <?php include("modulos/modCursos/buscarFormador.php");

                                                        foreach($resultado as $fila){
                                                            $nombre = $fila['nombre'];
                                                            

                                                            
                                                        
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
                    
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                            <th>Nombre del curso</th>
                                            <th>Area</th>
                                            <th>Dia</th>
                                            <th>Horario</th>
                                            <th>Formador</th>
                                            <th>Enlace</th>
                                            <th>Mantenimiento</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       <?php
                                       include('../connection.php');

                                       $sql = "SELECT * FROM `cursos` WHERE 1";
                                       $sqlEX = mysqli_query($connection, $sql);
                                       if($sqlEX){
                                        $row = mysqli_fetch_array($sqlEX);

                                        foreach($sqlEX as $row){

                                            $query = "SELECT * FROM formador WHERE 1";
                                            $resultado = mysqli_query($connection, $query);
                                            $fila = mysqli_fetch_assoc($resultado);
                                            // echo '<script> alert("'.$fila['nombre'].'"); </script>'
                                            

                                            
                                        

                                            $id = $row['id_curso'];
                                            $formador = $row['formador'];
                                            $dia = $row['dia'];
                                            $horario = $row['horario'];


                                            echo "<tr>";
                                            echo '<td>' .$row['nombre'] . '</td>';
                                            echo '<td>' .$row['area'] . '</td>';

                                            


                                            //EDITAR DIA
                                            
                                            echo '<td>'.'
                                            <!-- Button trigger modal -->
                                    <button  class="btn btn-primary" id="diaBtn" data-dia="'.$dia.'" data-id="'.$id.'">
                                    '.$row["dia"].'
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Dia </h5>
                                            
                                        </div>
                                        <div class="modal-body">
                                        <form id="diaForm" action="" method="POST">
                                        
                                        <select id="nuevoDia">
                                        <option value="LUNES">LUNES</option>
                                        <option value="MARTES">MARTES</option>
                                        <option value="MIERCOLES">MIERCOLES</option>
                                        <option value="JUEVES">JUEVES</option>
                                        <option value="VIERNES">VIERNES</option>
                                        </select>

                                        <input type="hidden" id="idDia" name="idDia">
                                        </input>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                            <button type="submit" id="submitFor" onclick="" class="btn btn-primary">Editar</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                                                                '.'</td>';


                                            //EDITAR HORA
                                            echo '<td>'
                                            .'
                                            <!-- Button trigger modal -->
                                    <button  class="btn btn-primary" id="horarioBtn" data-horario="'.$horario.'" data-id="'.$id.'">
                                    '.$row["horario"].'
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Horario ⌚</h5>
                                            
                                        </div>
                                        <div class="modal-body">
                                        <form id="horarioForm" action="" method="POST">
                                        <input type="time" name="nuevoHorario" id="nuevoHorario">
                                        </input>

                                        <input type="hidden" id="idHorario" name="idHorario">
                                        </input>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                            <button type="submit" id="submitFor" onclick="" class="btn btn-primary">Editar</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                                                                '.
                                            '</td>';

                                            //EDITAR FORMADOR
                                            echo '<td>'.'
                                            <!-- Button trigger modal -->
                                    <button  class="btn btn-primary formadorBtn" id="formadorBtn" onclick="" data-formador="'.$formador.'" data-id= "'.$id.'">
                                    '.$row["formador"].'
                                    </button> 
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Seleccionar Formador disponible</h5>
                                            
                                        </div>
                                        <div class="modal-body">
                                        <form id="formadorForm" action="" method="POST">
                                        <input type="hidden" id="idFormador" name="idFormador">
                                        </input>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                        <button type="submit" id="submitFor" onclick="" class="btn btn-primary">Editar</button>
                                        <select id="nuevoFor">
                                        '.$query = "SELECT * FROM formador WHERE 1";
                                        $resultado = mysqli_query($connection, $query);
                                        $fila = mysqli_fetch_assoc($resultado);
                                        foreach ($resultado as $fila) {
                                            $nombreF = $fila["nombre"];

                                            echo "<option value=".$nombreF." > ".$nombreF."</option>";
                                        }
                                        
                                        ' '.''.'
                                       
                                        </select>

                                        
                                        
                                        </div>
                                        <div class="modal-footer">
                                            
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                                                                '.'</td>';


                                            echo '<td>' .'<a href='. $row['link'] .'>Ver</a>' . '</td>';


                                            

                                            echo '<td>' . '<button class="btn btn-primary">Editar</button><button class="btn btn-danger" name="submit"><a style="color:white; text-decoration: none;" href="modulos/modCursos/deshabilitarCurso.php?id='.$id.'">Deshabilitar</a></button>' . '</td>';

                                            
                                            echo "</tr>";

                                        }
                                       }
                                       ?> 
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            

            <!-- Footer -->
            <?php include('modulos/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>

        //EDITAR FORMADOR
       
            $(document).on('click', '#formadorBtn',function () {
                let formador = $(this).data('formador');
                let id = $(this).data('id');
                console.log(id , formador);
                document.getElementById('idFormador').value = id;

                $("#exampleModal").modal("show");

                $('#formadorForm').submit(e => {
                    e.preventDefault();
                    //creacion de objeto de almacenamiento de los inputs "postData"
                    const postData = {
                    //guardamos los input dentro de un objeto
                    nuevoFor : $("#nuevoFor").val(),
                    id : $("#idFormador").val()
                    };
                    //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                    const url = "modulos/modCursos/editarFor.php";
                    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                    console.log(postData, url);
                    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                    //procesamiento de dichos datos)
                    $.post(url, postData, (response) => {

                    const rta = JSON.parse(response);
                    console.log(rta);
                    if(rta == 1){
                        window.location = "administrarCursos.php";
                    }
                    
                    });
                });


               


             });

             //EDITAR DIA

             $(document).on('click', '#diaBtn',function () {
                let dia = $(this).data('dia');
                let id = $(this).data('id');
                console.log(id , dia);
                document.getElementById('idDia').value = id;

                $("#exampleModal2").modal("show");

                $('#diaForm').submit(e => {
                    e.preventDefault();
                    //creacion de objeto de almacenamiento de los inputs "postData"
                    const postData = {
                    //guardamos los input dentro de un objeto
                    nuevoDia : $("#nuevoDia").val(),
                    id : $("#idDia").val()
                    };
                    //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                    const url = "modulos/modCursos/editarDia.php";
                    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                    console.log(postData, url);
                    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                    //procesamiento de dichos datos)
                    $.post(url, postData, (response) => {

                    const rta = JSON.parse(response);
                    console.log(rta);
                    if(rta == 1){
                        window.location = "administrarCursos.php";
                    }
                    
                    });
                });
            });

                    //EDITAR HORARIO
                    
                    $(document).on('click', '#horarioBtn',function () {
                        let horario = $(this).data('horario');
                        let id = $(this).data('id');
                        console.log(id , horario);
                        document.getElementById('idDia').value = id;

                        $("#exampleModal3").modal("show");

                        $('#horarioForm').submit(e => {
                            e.preventDefault();
                            //creacion de objeto de almacenamiento de los inputs "postData"
                            const postData = {
                            //guardamos los input dentro de un objeto
                            nuevoHorario : $("#nuevoHorario").val(),
                            id : $("#idDia").val()
                            };
                            //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                            const url = "modulos/modCursos/editarHorario.php";
                            //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                            console.log(postData, url);
                            //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                            //procesamiento de dichos datos)
                            $.post(url, postData, (response) => {

                            const rta = JSON.parse(response);
                            console.log(rta);
                            if(rta == 1){
                                window.location = "administrarCursos.php";
                            }
                            
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
    

    <!-- Page level plugins -->
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