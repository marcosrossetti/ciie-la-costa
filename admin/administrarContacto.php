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
    
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    <h1 class="pl-3 pt-3 h3 mb-4 text-gray-800">Administrar contactos</h1>
                </div>  
                <div class="container-fluid">
                    <!-- TABLA -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Mensaje</th>
                                            <th>Mantenimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include("../connection.php");
                                        $sql = "SELECT * FROM `contacto` WHERE 1";
                                        $sqlEX = mysqli_query($connection, $sql);
                                        $row = mysqli_fetch_array($sqlEX);

                                        foreach($sqlEX as $row) {
                                            $id = $row["id"];
                                            echo '
                                            <tr>
                                            <td>'.$row["nombre"].'</td>
                                            <td>'.$row["email"].'</td>
                                            <td>'.$row["telefono"].'</td>
                                            <td>'.$row["mensaje"].'</td>
                                            <td>
                                            <button class="btn btn-danger" name="submit"><a style="color:white; text-decoration: none;" data-id="'.$id.'" id="borrarMensaje"><i class="fa-solid fa-eraser"></i></a></button>
                                            </td>        
                                            </tr>
                                            ';
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

    <script>
        $(document).on('click', '#borrarMensaje',function () {
                var id = $(this).data('id');
                console.log(id);
                   
                    //creacion de objeto de almacenamiento de los inputs "postData"
                    const postData = {
                    //guardamos los input dentro de un objeto
                   
                    id : id
                    };
                    //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                    const url = "modulos/modContact/borrarMensaje.php";
                    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                    console.log(postData, url);
                    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                    //procesamiento de dichos datos)
                   enviarDatos();

                    function enviarDatos(){
                        $.post(url, postData, (response) => {

                            
                            const rta = JSON.parse(response);
                            console.log(rta);
                            if(rta == 1){
                                Swal.fire('Consulta eliminada, podrá requerirla en la tabla "Recibidos"').then(function(){
                                    window.location = "administrarContacto.php";
                                });

                            }

                            });
                    }
                    
                
            });
    </script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>