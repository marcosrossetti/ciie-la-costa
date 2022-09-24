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

    <title>ADMIN - CIIE La Costa</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

                <div class="row m-0 mb-3" style="background-color:#fff"> 
                    <h1 class="pl-3 pt-3 h3 mb-4 text-gray-800">Administrar ofertas</h1>
                </div>  

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header p-0" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-primary btn-block text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
                                       include('../connection.php');
                                       error_reporting(0);

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
                                            echo '<td width="20%" class="text-center">' . '<button class="btn btn-primary" data-toggle="modal" id="editarBtn" data-id="'.$id.'"><i class="fa-solid fa-pen-to-square"></i></button> <button class="btn btn-danger" name="submit"><a style="color:white; text-decoration: none;" href="modulos/modOfe/deshabilitar.php?id='.$id.'"><i class="fa-solid fa-person-arrow-down-to-line"></i></button> <button class="btn btn-danger"><i class="fa-solid fa-eraser"></i></button>' . '</td>';
                                            echo "</tr>";

                                            echo '

                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                                                <button type="button" id="modal"  class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        <div class="modal-body">
                                                        <form id="idForm">
                                                            <input type="text" id="nuevoTitulo" placeholder="Titulo de la oferta" class="form-control mb-2" required>
                                                            <select id="nuevoNivel">
                                                            <option value="Inicial">Inicial</option>
                                                            <option value="Primario">Primario</option>
                                                            <option value="Secundario">Secundario</option>
                                                            <select/>
                                                            <input type="date" id="nuevaFecha" placeholder="Fecha" class="form-control mb-2" required>
                                                            <input type="text" id="nuevaDescripcion" placeholder="Descripcion" class="form-control mb-2" required>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" id="submit" class="btn btn-primary">Guardar cambios</button>

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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
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

                
                

                
                
                

                
            


                // $(document).on('click','#submit',e => {
                //     e.preventDefault();
                //     //creacion de objeto de almacenamiento de los inputs "postData"
                    
                // });
           

            </script>

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