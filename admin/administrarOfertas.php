<?php
    //seguridad de redireccionamiento
    session_start();
    include('modulos/segUrl.php');
    destroyAdmin();
    include('../connection.php');
    error_reporting(0);
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


    <!-- LINKS FUENTES Y FONT AWESOME -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- LINKS CSS PLANTILLA -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- LINK DATA TABLES -->
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
                    <h1 class="pl-3 pt-3 h3 mb-4 text-gray-800">Administrar ofertas</h1>
                </div>  
                <div class="container-fluid">

                    <!-- BOTON ACORDEON -->
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header p-0" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-primary btn-block text-center" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Agregar ofertas
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="agregarOfe">
                                        <div class="form-group">
                                            <label>Titulo de la oferta</label>
                                            <input type="text" name="tituloOferta" id="tituloOferta" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nivel</label>
                                            <select name="nivel" id="nivel" class="form-control">
                                                <option value="inicial">Inicial</option>
                                                <option value="primario">Primario</option>
                                                <option value="secundario">Secundario</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha</label>
                                            <input type="date" name="fecha" id="fecha" class="form-control" rows="3" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Descripcion</label>
                                            <input type="text" name="descripcion" id="descripcion" class="form-control" rows="3" required></input>
                                        </div>                
                                        <button type="submit" id="submitA" name="submitA" class="btn btn-primary">Cargar</button>
                                     </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalRelOfcu" tabindex="-1" aria-labelledby="modalRelOfcuLabel1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalRelOfcuLabel1">Agregar cursos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label>Cursos disponibles</label>
                                <select class="form-control mb-2">
                                    <?php
                                        $sql = "SELECT * FROM `cursos` WHERE 1";
                                        $sqlEX = mysqli_query($connection, $sql);
                                        if($sqlEX){
                                            $row = mysqli_fetch_array($sqlEX);
                                        
                                            foreach($sqlEX as $row){
                                                echo'<option id="'.$row['id_curso'].'">'.$row['nombre'].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Guardar</button>
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
                                            <th>Titulo de la oferta</th>
                                            <th>Nivel</th>
                                            <th>Fecha</th>
                                            <th>Descripcion</th>
                                            <th>Estado</th>
                                            <th>Mantenimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM `ofertas` WHERE 1";
                                            $sqlEX = mysqli_query($connection, $sql);
                                            if($sqlEX){
                                                $row = mysqli_fetch_array($sqlEX);
                                            
                                                foreach($sqlEX as $row){
                                                    $fecha = $row['fecha'];
                                                    $id = $row['id_o'];
                                                    $descripcion = $row['descripcion'];

                                                    echo "<tr>";
                                                    echo '<td>' .$row['titulo'] . '</td>';
                                                    echo '<td>' .$row['nivel'] . '</td>';
                                                    echo '<td>' .$fecha.'</td>';
                                                    echo '<td><a href="#" onclick="alert(`(alert temporal)\n'.$descripcion.'`);">ver mas...</a></td>';
                                                    echo '<td> prueba </td>';
                                                    echo '<td width="20%" class="text-center">' . 
                                                    '<button class="btn btn-sm btn-primary" title="Editar datos" data-toggle="modal" id="editarBtn" data-id="'.$id.'" data-bs-target="#exampleModal"><i class="fa-solid fa-pen-to-square"></i></button>
                                                     <button class="btn btn-sm btn-primary" title="Agregar cursos" data-toggle="modal" data-target="#modalRelOfcu"><i class="fa-solid fa-plus"></i></button>
                                                     <button class="btn btn-sm btn-danger" title="Editar estado"><i class="fa-solid fa-person-arrow-down-to-line"></i></button>
                                                      <button class="btn btn-sm btn-danger" title="Eliminar"><a style="color:white; text-decoration:none;" href="modulos/modOfe/deshabilitar.php?id='.$id.'"<i class="fa-solid fa-eraser"></i></a></button>' . '</td>';
                                                    echo "</tr>";
                                                    echo '
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
                        <form id="idForm">
                            <div class="modal-body">
                                <input type="text" id="nuevoTitulo" placeholder="Titulo de la oferta" class="form-control mb-2" required>
                                <select id="nuevoNivel" class="form-control mb-2">
                                    <option value="Inicial">Inicial</option>
                                    <option value="Primario">Primario</option>
                                    <option value="Secundario">Secundario</option>
                                </select>
                                <input type="date" id="nuevaFecha" placeholder="Fecha" class="form-control mb-2" required>
                                <input type="text" id="nuevaDescripcion" placeholder="Descripcion" class="form-control mb-2" required>
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