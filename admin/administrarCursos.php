
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
                    
                    <h1 class="h3 mb-4 text-gray-800">Administrar cursos</h1>

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
                                            <label>Formador</label>
                                            <input type="text" name="formador" id="formador" class="form-control" rows="3" required></input>
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
                                            <th>Formador</th>
                                            <th>Dia</th>
                                            <th>Horario</th>
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
                                            echo "<tr>";
                                            echo '<td>' .$row['nombre'] . '</td>';
                                            echo '<td>' .$row['area'] . '</td>';
                                            echo '<td>' .'<a href="modulos/modCursos/cambiarFormador.php?id='.$row['id_curso'].'">' .$row['formador'] .'</a>' . '</td>';
                                            echo '<td>' .'<a href="modulos/modCursos/cambiarDia.php?id='.$row['id_curso'].'">' .$row['dia'] .'</a>' . '</td>';
                                            echo '<td>' .'<a href="modulos/modCursos/cambiarHorario.php?id='.$row['id_curso'].'">' .$row['horario'] .'</a>' . '</td>';
                                            echo '<td>' .'<a href='. $row['link'] .'>Ver</a>' . '</td>';
                                            echo '<td>' . '<button name="submit"><a href="modulos/modCursos/deshabilitarCurso.php?id='.$row['id_curso'].'">Deshabilitar curso</a></button>' . '</td>';
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

    <script src="modulos/funciones.js"></script>

</body>

</html>