<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Contacto y redes</title>
    

        
  </head>
  <body>

<div class="p-5 text-center bg-light">
    <h1 class="mb-3">Consultas de Usuarios</h1>
  </div>
  
  <div class="row">      
  <div class="container mt-5">
  <table id="tablaContacto" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Mensaje</th> 
                            <th>Mantenimiento</th>       
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                    include("../connection.php");
                    $sql = "SELECT * FROM `contacto` WHERE 1";
                    $sqlEX = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_array($sqlEX);

                    foreach($sqlEX as $row){
                        $id = $row["id"];
                    echo '
                    <tr>
                    <td>'.$row["nombre"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["telefono"].'</td>
                    <td>'.$row["mensaje"].'</td>
                    <td>
                    <button class="btn btn-danger" name="submit"><a style="color:white; text-decoration: none;" data-id="'.$id.'" id="borrarMensaje">Eliminar este mensaje</a></button>
                    </td>        
                    </tr>
                    ';
                    }
                    ?>

                        
                              </tbody>
    
</table>
</div>
    

    <!--datatables scripts -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/r-2.2.9/sb-1.3.2/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
            $(document).ready(function () {
                $('#tablaContacto').DataTable();
            });

        </script>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '#borrarMensaje',function () {
                var id = $(this).data('id');
                console.log(id);
                   
                    //creacion de objeto de almacenamiento de los inputs "postData"
                    const postData = {
                    //guardamos los input dentro de un objeto
                   
                    id : id
                    };
                    //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                    const url = "modulos/modContact/borrarMensaje.php";
                    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                    console.log(postData, url);
                    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                    //procesamiento de dichos datos)
                   enviarDatos();

                    function enviarDatos(){
                        $.post(url, postData, (response) => {

                            
                            const rta = JSON.parse(response);
                            console.log(rta);
                            if(rta == 1){
                                Swal.fire('Consulta eliminada, podrá requerirla en la tabla "Recibidos"').then(function(){
                                    window.location = "administrarContacto.php";
                                });

                            }

                            });
                    }
                    
                
            });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>