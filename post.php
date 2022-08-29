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

        <!-- TITULO -->

        <title>CIIE La Costa</title>

    </head>
    <body>

        <!-- LINK HEADER -->
        
        <?php include("modulos/header.php") ?>

        

        <!-- CONTENIDO -->

        <?php
        include("connection.php");
         $id = $_GET['id'];

         $sql="SELECT * FROM `ofertas` WHERE `id_o` = '$id'";
         $result = mysqli_query($connection, $sql);
         $row = mysqli_fetch_array($result);

         foreach($result as $row){

            $titulo = $row['titulo'];
            $nivel = $row['nivel'];
            $fecha = $row['fecha'];
            $descripcion = $row['descripcion'];

            echo '
            
        

        <header class="masthead" style="background-image: url("assets/img/post-bg.jpg">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-heading">
                            <h1>Oferta de Formación Nivel '.$nivel.'.</h1>
                            <h2 class="subheading"></h2>
                            <span class="meta">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

       
            ';

            echo '
            <article>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <h2>Información:</h2>
                        <p>Fecha de apertura: '.$fecha.'</p>
                        <p>Región 18.</p>
                        <p>Inscripción: Nivel '.$nivel.'.</p>
                        <h3>Descripción de la oferta:</h3>
                        <p>'.$descripcion.'</p>
                    </div>
                </div>
            </div>
        </article>
            
            ';

         }



        ?>

        
        <hr/>

        <!-- CIERRE CONTENIDO -->
        
        <!-- FOOTER -->

        <?php include("modulos/footer.php") ?>

        <!-- SCRIPTS BOOTSTRAP Y JQUERY-->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        
        <!-- LINKS SCRIPTS -->

        <script src="js/scripts.js"></script>

    </body>
</html>
