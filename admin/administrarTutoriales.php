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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- INCLUDE MODULO SIDEBAR -->

        <?php include("modulos/sidebar.php") ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="row m-0 mb-3" style="background-color:#fff"> 
                    <h1 class="pl-3 pt-3 h3 mb-4 text-gray-800">Administrar tutoriales</h1>
                </div>
                <div class="container-fluid">

                    <!-- BOTON ACORDEON -->
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header p-0" id="headingOne">
                                <h2 class="mb-0">
                                <button class="btn btn-primary btn-block text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Agregar tutoriales
                                </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Descripcion</label>
                                        <input type="text" name="descripcion" id="descripcion" class="form-control" rows="3" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" name="url" id="url" class="form-control" rows="3" required></input>
                                    </div>           
                                    <button id="submitA" name="submitA" class="btn btn-primary">Cargar</button>
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
                                            <th>Titulo</th>
                                            <th>Descripcion</th>
                                            <th>Enlace</th>
                                            <th>Estado</th>
                                            <th>Mantenimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include('../connection.php');
                                            error_reporting(0);

                                            $query = "SELECT * FROM `tutoriales` WHERE `eliminado` = 0";
                                            $result = mysqli_query($connection, $query);
                                            if($result) {
                                                $row = mysqli_fetch_array($result);
                                                    foreach($result as $row) {
                                                        $des = $row['des'];
                                                        $id = $row['id'];
                                                        $estado = $row['estado'];
                                                        if($estado == 0){
                                                            $estadoE = "Activo";

                                                        } else {
                                                            $estadoE = "Desactivado";
                                                        }

                                                        echo 
                                                        '
                                                            <tr>
                                                                <td>'.$row["titulo"].'</td>

                                                                <td>'.$row["des"].'</td>

                                                                <td><a href='.$row["url"].' target="_blank">Ver</a></td>

                                                                <td>'.$estadoE.'</td>
                                                                
                                                                <td width="20%" class="text-center"><button class="btn btn-sm btn-primary" title="Editar datos" data-toggle="modal" data-id="'.$id.'" id="editarBtnT"><i class="fa-solid fa-pen-to-square"></i></button> <button class="btn btn-sm btn-danger" title="Editar estado" data-id="'.$id.'" id="estado-adit" data-estado="'.$estado.'"><i class="fa-solid fa-right-left"></i></button> <button class="btn btn-sm btn-danger" title="Eliminar" data-id="'.$id.'" id="elim_tu"><a style="color: white; text-decoration:none"><i class="fa-solid fa-eraser"></i></a></button></td>
                                                            </tr>
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
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="idFormT">
                            <div class="modal-body">
                                <input type="text" id="nuevoTitulo" placeholder="Titulo" class="form-control mb-2" required>
                                <input type="text" id="nuevaDescripcion" placeholder="Descripcion" class="form-control mb-2" required>
                                <input type="text" id="nuevoEnlace" placeholder="Enlace" class="form-control mb-2" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="submit" id="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- INCLUDE MODULO FOOTER -->
            <?php include('modulos/footer.php'); ?>

        </div>
    </div>

    <!-- End of Page Wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>
        $(document).on('click', '#desBtn',function () {
                let des = $(this).data('des');
                let id = $(this).data('id');
                console.log(id , des);
                document.getElementById('idDes').value = id;

                $("#exampleModal").modal("show");

                $('#nuevaDes').submit(e => {
                    e.preventDefault();
                    //creacion de objeto de almacenamiento de los inputs "postData"
                    const postData = {
                    //guardamos los input dentro de un objeto
                    nuevaDes : $("#des").val(),
                    id : $("#idDes").val()
                    };
                    //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                    const url = "modulos/modTuto/editarDes.php";
                    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                    console.log(postData, url);
                    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                    //procesamiento de dichos datos)
                    $.post(url, postData, (response) => {

                    const rta = JSON.parse(response);
                    console.log(rta);
                    if(rta == 1){
                        window.location = "administrarTutoriales.php";
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

    <!-- Script -->
    <script type="text/javascript">

        $("#submitA").click(function() {
            agregar();
        });

        function agregar() {
            let datos = {
                titulo: $("#titulo").val(),
                desc: $("#descripcion").val(),
                url: $("#url").val(),
                tipo: "tutorial"
            }
            let tablaDatos = "";

            $.post("modulos/agregarConsultas.php", {titulo:datos.titulo, desc:datos.desc, url:datos.url, tipo:datos.tipo}, function(data) {
                if(data == '1') {
                    //console.log(data + " funciona");
                    location.reload(); // :)
                } else {
                    console.log(data + " no funciona");
                }
            });
        }
    </script>

    <script src="modulos/funciones.js"></script>
    <script src="modulos/modTuto/tut.js"></script>


</body>

</html>