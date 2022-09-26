$(document).ready(function() {
    console.log("jQuery is working");

//editar ofertas
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

//editar formador
$(document).on('click','#editarBtnF',function (){
                     let id = $(this).data('id');
                     console.log(id);


                    $("#exampleModal").modal("show");

                    $('#idFormF').submit(e => {
                    e.preventDefault();
                    $(document).on('click','#submit', function (){

                    //creacion de objeto de almacenamiento de los inputs "postData"
                    const postData = {
                    //guardamos los input dentro de un objeto
                    id : id,
                    nuevoNombre : $("#nuevoNombre").val(),
                    nuevoDni : $("#nuevoDni").val(),
                    nuevoEmail : $("#nuevoEmail").val(),
                    nuevoTelefono : $("#nuevoTelefono").val()
                    
                    };
                    //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                    const url = "modulos/modFor/editar.php";
                    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                    console.log(postData, url);
                    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                    //procesamiento de dichos datos)
                    $.post(url, postData, (response) => {
                        

                        const rta = JSON.parse(response);
                    console.log(rta);
                    if(rta == 1){
                        window.location = "administrarFormador.php";
                    }
                    // console.log(response);

                    
                    
                    });
                    });
                    
                });   

                   });

//editar area
$(document).on('click','#editarBtnA',function (){
                     let id = $(this).data('id');
                     console.log(id);


                    $("#exampleModal").modal("show");

                    $('#idFormA').submit(e => {
                    e.preventDefault();
                    $(document).on('click','#submit', function (){

                    //creacion de objeto de almacenamiento de los inputs "postData"
                    const postData = {
                    //guardamos los input dentro de un objeto
                    id : id,
                    nuevoNombre : $("#nuevoNombre").val()
                    
                    
                    };
                    //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                    const url = "modulos/modArea/editar.php";
                    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                    console.log(postData, url);
                    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                    //procesamiento de dichos datos)
                    $.post(url, postData, (response) => {
                        

                        const rta = JSON.parse(response);
                    console.log(rta);
                    if(rta == 1){
                        window.location = "administrarArea.php";
                    }
                    // console.log(response);

                    
                    
                    });
                    });
                    
                });   

                   });  


//editar tutoriales
$(document).on('click','#editarBtnT',function (){
                     let id = $(this).data('id');
                     console.log(id);


                    $("#exampleModal").modal("show");

                    $('#idFormT').submit(e => {
                    e.preventDefault();
                    $(document).on('click','#submit', function (){

                    //creacion de objeto de almacenamiento de los inputs "postData"
                    const postData = {
                    //guardamos los input dentro de un objeto
                    id : id,
                    nuevoTitulo : $("#nuevoTitulo").val(),
                    nuevaDescripcion : $("#nuevaDescripcion").val(),
                    nuevoEnlace : $("#nuevoEnlace").val()
                    
                    
                    };
                    //validacion ternaria de redireccion segun valor de la variable booleana "edit"
                    const url = "modulos/modTuto/editar.php";
                    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
                    console.log(postData, url);
                    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
                    //procesamiento de dichos datos)
                    $.post(url, postData, (response) => {
                        

                        const rta = JSON.parse(response);
                    console.log(rta);
                    if(rta == 1){
                        window.location = "administrarTutoriales.php";
                    }
                    // console.log(response);

                    
                    
                    });
                    });
                    
                });   

                   });  


//Agregar Curso
$('#agregar').submit(e => {

    
    const link = 'modulos/agregarCurso.php';
    e.preventDefault();
    //creacion de objeto de almacenamiento de los inputs "postData"
    const postData = {
      //guardamos los input dentro de un objeto
        area : $('#area').val(),
        nombre : $('#nombre').val(),
        formador : $('#formador').val(),
        dia : $('#dia').val(),
        horario : $('#horario').val(),
        url : $('#url').val()
    };
    
    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
    console.log(postData, link);
    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
    //procesamiento de dichos datos)
    $.post(link, postData, (response) => {

        result = JSON.parse(response);
        if(result == "1"){
      location.reload();}
      else{
        alert("El formador no se encuentra en la lista disponible");
      }
      

        $('#agregar').trigger('reset');
        
      
    });
  });



//agregar una oferta
  $('#agregarOfe').submit(e => {

    
    const link = 'modulos/agregarConsultas.php';
    e.preventDefault();
    //creacion de objeto de almacenamiento de los inputs "postData"
    const postData = {
      //guardamos los input dentro de un objeto
      tituloOferta : $("#tituloOferta").val(),
      nivel : $("#nivel").val(),
      fecha : $("#fecha").val(),
      descripcion : $("#descripcion").val(),
      tipo: "oferta"
    };
    
    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
    console.log(postData, link);
    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
    //procesamiento de dichos datos)
    $.post(link, postData, (response) => {

        
      

        $('#agregarOfe').trigger('reset');
        location.reload();
        
      
    });
  });


//agregar Formador
  $('#agregarFormador').submit(e => {

    
    const link = 'modulos/agregarConsultas.php';
    e.preventDefault();
    //creacion de objeto de almacenamiento de los inputs "postData"
    const postData = {
      //guardamos los input dentro de un objeto
      nombreCompleto : $("#nombreCompleto").val(),
      dni : $("#dni").val(),
      email : $("#email").val(),
      telefono : $("#telefono").val(),
      tipo: "formador"
    };
    
    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
    console.log(postData, link);
    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
    //procesamiento de dichos datos)
    $.post(link, postData, (response) => {

        
      
        $('#agregarFormador').trigger('reset');
        location.reload();
        
      
    });
  });

});
$('#formadorForm').submit(e => {

  console.log("A");

  });


  //agregar un area
  $('#agregarArea').submit(e => {

    
    const link = 'modulos/agregarConsultas.php';
    e.preventDefault();
    //creacion de objeto de almacenamiento de los inputs "postData"
    const postData = {
      //guardamos los input dentro de un objeto
      nombre : $("#nombreArea").val(),
      tipo : "area"
    };
    
    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
    console.log(postData, link);
    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
    //procesamiento de dichos datos)
    $.post(link, postData, (response) => {

        
      
      
        $('#agregarArea').trigger('reset');
        location.reload();
        
      
    });
  });












 