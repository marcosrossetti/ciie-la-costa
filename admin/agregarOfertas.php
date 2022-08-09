<?php
//seguridad de redireccionamiento
session_start();
include('modulos/segUrl.php');
destroyAdmin();
?>

<!DOCTYPE html>
<html lang="en">

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

                    <h1 class="h3 mb-4 text-gray-800">Agregar Oferta</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <!-- Formulario -->
                            <form id="agregar">
                            <div class="form-group">
                                    <label>Nombre Curso</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Area</label>
                                    <input type="text" name="area" id="area" class="form-control" rows="3" required></input>
                                </div>

                                <div class="form-group">
                                    <label>Formador</label>
                                    <input type="text" name="formador" id="formador" class="form-control" rows="3" required></input>
                                </div>

                                <div class="form-group">
                                    <label>Dia</label>
                                    <select name="dia" id="dia">
                                        <option value="LUNES">LUNES</option>
                                        <option value="MARTES">MARTES</option>
                                        <option value="MIERCOLES">MIERCOLES</option>
                                        <option value="JUEVES">JUEVES</option>
                                        <option value="VIERNES">VIERNES</option>

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

                                <div class="form-group">
                                    <label>Nivel</label>
                                    <input type="text" name="nivel" id="nivel" class="form-control" rows="3" required></input>
                                </div>

                                <div class="form-group">
                                    <label>Mes Cursada</label>
                                    <input type="text" name="mes_cursada" id="mes_cursada" class="form-control" rows="3" required></input>
                                </div>
                                

                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                                </div>

                                <button type="submit" id="submitA" name="submitA" class="btn btn-primary">Enviar</button>

                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<script src="modulos/funciones.js"></script>
</body>

</html>