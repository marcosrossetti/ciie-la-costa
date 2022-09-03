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

        <!-- ENCABEZADO -->

        <header class="masthead" style="background-image: url('assets/img/fondopersonal.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="page-heading">
                            <h1>Contacto</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- CIERRE ENCABEZADO -->

        <!-- CONTENIDO -->

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>Contactanos mediante este formulario:</p>
                    <form id="contactForm" name="sentMessage" novalidate>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Nombre</label>
                                <input class="form-control" id="nombre" type="text" placeholder="Nombre" required data-validation-required-message="Por favor ingrese su nombre." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Email Address</label>
                                <input class="form-control" id="email" type="email" placeholder="Correo" required data-validation-required-message="Por favor ingrese su correo." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input class="form-control" id="phone" type="tel" placeholder="Numero de Telefono" required data-validation-required-message="Por favor ingrese su telefono." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Message</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Escriba su mensaje" required data-validation-required-message="Por favor ingrese el mensaje."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br />
                        <div id="success"></div>
                        <button class="btn btn-primary" id="sendMessageButton" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        <hr/>

        <!-- CIERRE CONTENIDO -->

        <!-- FOOTER -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

        <script>
            
                

                

                $('#contactForm').submit(e => {
                    e.preventDefault();
                    //creacion de objeto de almacenamiento de los inputs "postData"
                    const postData = {
                    //guardamos los input dentro de un objeto
                    nombre : $('#nombre').val(),
                    email : $('#email').val(),
                    tel : $('#phone').val(),
                    message : $('#message').val()
                    };
                    //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                    const url = "admin/modContact.php";
                    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                    console.log(postData, url);
                    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                    //procesamiento de dichos datos)
                    $.post(url, postData, (response) => {

                        console.log(response);

                    const rta = JSON.parse(response);
                    console.log(rta);
                    if(rta == 1){
                        Swal.fire({
                            title: 'Mensaje Enviado!',
                            text: 'En la brevedad le responderemos, revise su E-Mail',
                            imageUrl: 'https://ichef.bbci.co.uk/news/640/cpsprodpb/46C8/production/_106202181_ggm1598.jpg',
                            imageWidth: 400,
                            imageHeight: 200,
                            imageAlt: 'Custom image',
                            }).then(function(){
                                $('#contactForm').trigger('reset');
                            });
                        
                    }
                    
                    });
                });
            

        </script>

        <?php include("modulos/footer.php") ?>

        <!-- LINKS BOOTSTRAP Y JQUERY -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        
        <!-- SCRIPTS -->

        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <script src="js/scripts.js"></script>
        
    </body>
</html>
