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

    <!-- LINKS FUENTES Y FONT AWESOME -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- LINKS CSS PLANTILLA -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- LINKS DATA TABLES -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>ADMIN - CIIE La Costa</title>

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- INCLUDE MODULO SIDEBAR -->
        <?php include("modulos/sidebar.php") ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="row m-0 mb-3" style="background-color:#fff"> 
                    <h1 class="pl-3 pt-3 h3 mb-4 text-gray-800">Administrar area</h1>
                </div>  
                <div class="container-fluid">

                    <!-- BOTON ACORDEON -->
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header p-0" id="headingOne">
                                <h2 class="mb-0">
                                <button class="btn btn-primary btn-block text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Agregar area
                                </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="agregarArea">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="nombre" id="nombreArea" class="form-control" required>
                                        </div>
                                        <button type="submit" id="submitArea" name="submitArea" class="btn btn-primary">Cargar</button>
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
                                            <th>Estado</th>
                                            <th>Mantenimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       include('../connection.php');

                                       $sql = "SELECT * FROM `area` WHERE `eliminado` = 0";
                                       $sqlEX = mysqli_query($connection, $sql);
                                       if($sqlEX){
                                        $row = mysqli_fetch_array($sqlEX);

                                        foreach($sqlEX as $row){
                                            $id = $row['id'];
                                            $est = $row['estado'];
                                            if($est == 0){
                                                $estE = "Activo";
                                            } else {
                                                $estE = "Desactivado";
                                            }
                                            echo "<tr>";
                                            echo '<td>' .$row['nombre'] . '</td>';
                                            echo '<td>'.$estE.'</td>';
                                            echo '<td width="20%" class="text-center">' . '<button class="btn btn-primary" title="Editar datos" data-toggle="modal" data-id="'.$id.'" id="editarBtnA"><i class="fa-solid fa-pen-to-square"></i></button> <button class="btn btn-danger" title="Editar estado" data-id="'.$id.'" id="estado-adit" data-estado="'.$est.'"><i class="fa-solid fa-person-arrow-down-to-line"></i></button> <button class="btn btn-danger" title="Eliminar" id="elim_ar" data-id="'.$id.'"><a style="color:white; text-decoration:none"><i class="fa-solid fa-eraser"></i></a></button>' . '</td>';
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
                        <form id="idFormA">
                            <div class="modal-body">
                                <input type="text" id="nuevoNombre" placeholder="Nombre" class="form-control mb-2" required>
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

    <script src="modulos/modArea/area.js"></script>

</body>

</html>