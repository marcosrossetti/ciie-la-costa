$(document).ready(function() {
    console.log("jQuery is working");
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








 