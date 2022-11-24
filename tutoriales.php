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

        <!-- Navigation-->
        
        <?php include("modulos/header.php") ?>

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/fondopersonal.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="page-heading">
                            <h1>Tutoriales</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-10 mx-auto  tutorialesActivos" id="contenedorTutoriales">
                    <h1 class="tituloIndex">Tutoriales</h1>
                    <div class="post-preview" id="tutorialShow"></div>
                </div>
            </div>
        </div>
        
        <hr>

        <!-- Footer-->

        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

        <script>
            function buscarTutorial() {
                            //inicializamos el ajax
                            $.ajax({
                            //definimos una direccion y el tipo de formulario que se va a hacer (GET, toma de datos desde el servidor)
                            url: 'js/buscarTutorial.php',
                            type: 'GET',
                            //en caso exitoso, devolvemos la siguiente funcion
                            success: function(response) {

                                

                                let rta = JSON.parse(response);
                                // console.log(response);

                                

                                let template = '';
                                //lo iteramos y dibujamos con un foreach y etiquetas html
                                rta.forEach(rta => {
                                template += `
                                <a href="${rta.url}">
                                <h2 class="post-title">${rta.titulo} </h2>
                                <h3 class="post-subtitle">${rta.des}</h3>
                                </a>
                                        
                                        `
                                });
                                //mostramos el dibujo en el id selecionado, asignando la variable a mostrar
                                $('#tutorialShow').html(template);
                            

                                
                                
                            }
                            });
                        }

                        buscarTutorial();

        </script>

        <?php include("modulos/footer.php") ?>

        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <!-- Contact Form JavaScript-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
