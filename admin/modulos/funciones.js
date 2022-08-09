$(document).ready(function() {
    console.log("jQuery is working");
//Agregar Curso
$('#agregar').submit(e => {

    
    const link = 'modulos/agregarCurso.php';
    e.preventDefault();
    //creacion de objeto de almacenamiento de los inputs "postData"
    const postData = {
      //guardamos los input dentro de un objeto
        nombre : $('#nombre').val(),
        area : $('#area').val(),
        formador : $('#formador').val(),
        dia : $('#dia').val(),
        horario : $('#horario').val(),
        url : $('#url').val(),
        descripcion : $('#descripcion').val(),
        nivel : $('#nivel').val(),
        mes_cursada : $('#mes_cursada').val()
    };
    
    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
    console.log(postData, link);
    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
    //procesamiento de dichos datos)
    $.post(link, postData, (response) => {

        alert(response);
      

        $('#agregar').trigger('reset');
      
    });
  });

});





 