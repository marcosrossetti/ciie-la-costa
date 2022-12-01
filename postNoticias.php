<!DOCTYPE html>
<html lang="es">
    <head>

        <!-- LINKS META -->

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- LINKS ICONO -->

        <link rel="icon" type="image/x-icon" href="assets/icon.png"/>
        
        <!-- LINKS Y SCRIPTS DE FUENTES -->

        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css"/>
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        
        <!-- LINKS BOOTSTRAP -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <!-- LINKS CSS -->

        <link href="css/styles.css" rel="stylesheet"/>

        <!-- LINKS DATA TABLES -->
        <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- TITULO -->

        <title>CIIE La Costa</title>

        <style>
            .dataTables_filter,.dataTables_length,.dataTables_info {
                display: none;
            }
        </style>
    </head>
    <body>

        <!-- LINK HEADER -->
        
        <?php include("modulos/header.php") ?>

        

        <!-- CONTENIDO -->

        <?php
        include("connection.php");
        $id = $_GET['id'];

        $sql= "SELECT * FROM `ofertas` WHERE `id_o` = $id";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result);

        foreach($result as $row){

            $titulo = $row['titulo'];
            $nivel = $row['nivel'];
            $fecha = $row['fecha'];
            $descripcion = $row['descripcion'];

            echo '
        <header class="masthead" style="background-image: url(assets/img/fondonoticias.png);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-heading">
                            <h1>'.$titulo.' - Nivel '.$nivel.'.</h1>
                            <h2 class="subheading">'.$fecha.'</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>            
            <article class="mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <p class="h3 text-justify font-weight-normal">'.$descripcion.'</p>
                    </div>
                    ';
        }
        ?>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <h2 class="section-heading">CURSOS</h2>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Area</th>
                                <th>Dia</th>
                                <th>Horario</th>
                                <th>Formador</th>
                                <th>Enlace</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id=$_GET['id'];
                            $sql2 = "SELECT * FROM `ofertas` INNER JOIN `rel_ofcu` ON ofertas.id_o = rel_ofcu.id_o INNER JOIN `cursos` ON rel_ofcu.id_c = cursos.id_curso WHERE ofertas.id_o = $id";
                            $result2 = mysqli_query($connection, $sql2);
                            $row2 = mysqli_fetch_array($result2);
                            foreach($result2 as $row2){
                        echo '
                            <tr>
                                <td>'.$row2['nombre'].'</td>
                                <td>'.$row2['area'].'</td>
                                <td>'.$row2['dia'].'</td>
                                <td>'.$row2['horario'].'</td>
                                <td>'.$row2['formador'].'</td>
                                <td><a class="text-info" href="'.$row2['link'].'" target="_blank">Abrir enlace</a></td>
                            </tr>
                            ';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </article>
        
            



        
        
        <hr/>

        <!-- CIERRE CONTENIDO -->
        
        <!-- FOOTER -->

        <?php include("modulos/footer.php") ?>

        <!-- SCRIPTS BOOTSTRAP Y JQUERY-->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        
        <!-- LINKS SCRIPTS -->

        <!-- SCRIPTS DATA TABLE Y TRADUCCION -->
        <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }
                });
            });
        </script>

        <script src="admin/js/demo/datatables-demo.js"></script>

        <script src="js/scripts.js"></script>

    </body>
</html>
