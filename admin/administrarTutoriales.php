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

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Administrar tutoriales</h1>

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
                    
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Descripcion</th>
                                            <th>Enlace</th>
                                            <th>Mantenimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include('../connection.php');
                                            error_reporting(0);

                                            $query = "SELECT * FROM `tutoriales` WHERE 1";
                                            $result = mysqli_query($connection, $query);
                                            if($result) {
                                            $row = mysqli_fetch_array($result);
                                            

                                                foreach($result as $row) {
                                                    $des = $row['des'];
                                                    $id = $row['id'];

                                                    echo 
                                                    '
                                                        <tr>
                                                            <td>'.$row["titulo"].'</td>

                                                            <td>
                                                            <!-- Button trigger modal -->
                                                            <button  class="btn btn-primary" id="desBtn" data-des="'.$des.'" data-id="'.$id.'">
                                                            '.$row["des"].'
                                                            </button>
                        
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar Descripcion </h5>
                                                                    
                                                                </div>
                                                                <div class="modal-body">
                                                                <form id="nuevaDes" action="" method="POST">
                                                                
                                                                <input id="des"></input>
                        
                                                                <input type="hidden" id="idDes" name="idDes">
                                                                </input>
                                                                
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                                                    <button type="submit" id="submitDes" onclick="" class="btn btn-primary">Editar</button>
                                                                    </form>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            </td>

                                                            <td><a href='.$row["url"].' target="_blank">Ver</a></td>
                                                            <td><button><a href="modulos/modTuto/deshabilitar.php?id=$id">Deshabilitar tutorial</a></button></td>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

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

</body>

</html>