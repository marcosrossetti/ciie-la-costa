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
            $sqlEX = mysqli_query($connection, $sql);

            if($sqlEX) {
                $row = mysqli_fetch_array($sqlEX);
            }
        ?>

        <!-- CONTENIDO -->

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-md-10 mx-auto  contenedorOfertas" id="contenedorOfertas">
                    <h1 class="tituloIndex">Novedades</h1>

                    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
                        <script>
                        function buscarOferta() {
                            //inicializamos el ajax
                            $.ajax({
                            //definimos una direccion y el tipo de formulario que se va a hacer (GET, toma de datos desde el servidor)
                            url: 'js/buscarOferta.php',
                            type: 'GET',
                            //en caso exitoso, devolvemos la siguiente funcion
                            success: function(response) {

                                

                                let rta = JSON.parse(response);
                                // console.log(response);

                                

                                let template = '';
                                //lo iteramos y dibujamos con un foreach y etiquetas html
                                rta.forEach(rta => {
                                template += `
                                <a href="post.php?id=${rta.id}">
                                <h2 class="post-title">${rta.titulo} </h2>
                                <h3 class="post-subtitle">${rta.fecha}</h3>
                                </a>
                                <p class="post-meta">
                                CIIE's - Región 18 - Inscripción: PARA NIVEL ${rta.nivel}
                                </p>
                                        
                                        `
                                });
                                //mostramos el dibujo en el id selecionado, asignando la variable a mostrar
                                $('#ofertaShow').html(template);
                            

                                
                                
                            }
                            });
                        }
            
            buscarOferta();</script>   

                    <div class="post-preview" id="ofertaShow">
                        
                    </div>
                    
                    <!-- Pager-->
                    <div class="clearfix"><a class="btn btn-primary float-right btnOfertas" href="noticias.php">Ver mas</a></div>
                </div>
            
            
                <div class="col-lg-5 col-md-10 mx-auto  contenedorOfertas">
                    <h1 class="tituloIndex">Facebook</h1>
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v14.0" nonce="t7AKkxAs"></script>
                    
                    <div class="fb-page" data-href="https://www.facebook.com/lacosta.ciie" data-tabs="timeline" data-width="500" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
                        <blockquote cite="https://www.facebook.com/lacosta.ciie" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/lacosta.ciie">CIIE Partido de La Costa</a>
                        </blockquote>
                    </div>
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
