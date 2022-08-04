<!DOCTYPE html>
<html lang="es">
    <head>

        <!-- LINKS META -->

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

        <!-- ENCABEZADO -->

        <header class="masthead" style="background-image: url('assets/img/fondoindex.png')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1>CIIE</h1>
                            <span class="subheading">Partido de La Costa</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- CIERRE ENCABEZADO -->

        <?php
            include('connection.php');
            $sql = "SELECT * FROM `cursos` WHERE 1";
            $sqlEX = mysqli_query($con, $sql);

            if($sqlEX) {
                $row = mysqli_fetch_array($sqlEX);
            }
        ?>

        <!-- CONTENIDO -->

        <div class="container">    
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto  contenedorOfertas">
                    <h1 class="tituloIndex">Ofertas Activas</h1>
                    <hr class="hrTitulo">
                    <div class="post-preview">
                        <a href="post.php">
                            <h2 class="post-title">Formación Nivel Secundario </h2>
                            <h3 class="post-subtitle">Junio - Julio 2022</h3>
                        </a>
                        <p class="post-meta">
                        CIIE's - Región 18 - Inscripción: PARA NIVEL SECUNDARIO - Inicio de la cursada: A confirmar por el formador
                        </p>
                    </div>
                    <hr />
                    <div class="post-preview">
                        <a href="post.php">
                            <h2 class="post-title">Formación Nivel Primario</h2>
                            <h3 class="post-subtitle">Junio - Julio 2022</h3>
                        </a>
                        <p class="post-meta">
                        CIIE's - Región 18 - Inscripción: PARA NIVEL PRIMARIO - Inicio de la cursada: Comienzan entre la primer y segunda semana de Junio. 
                        <br> 
                        Destinado a equipos de conducción, MG, Docentes de grado Educación Especial y Educación de Jóvenes, Adultos y Adultos Mayores. 
                        Profesores segun modalidad, Estudiantes avanzados del 4° año del profesorado de educación primaria o modalidad según corresponda.
                        </p>
                    </div>
                    <hr />
                    <div class="post-preview">
                        <a href="post.php">
                            <h2 class="post-title">Formación Nivel Inicial </h2>
                            <h3 class="post-subtitle">Junio - Julio 2022</h3>
                        </a>
                        <p class="post-meta">
                        CIIE's - Región 18 - Inscripción: PARA NIVEL INICIAL - Inicio de la cursada: A confirmar por el formador.
                        </p>
                    </div>
                    <hr />
                    <!-- Pager-->
                    <div class="clearfix"><a class="btn btn-primary float-right btnOfertas" href="noticias.php">Ofertas Antiguas →</a></div>
                </div>
            </div>
        </div>
        <hr/>

        <!-- CIERRE CONTENIDO -->

        <!-- LINK FOOTER -->

        <?php include("modulos/footer.php") ?>

        <!-- LINKS DE BOOTSTRAP Y JQUERY -->
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        
        <!-- LINKS SCRIPTS -->

        <script src="js/scripts.js"></script>
        
    </body>
</html>
