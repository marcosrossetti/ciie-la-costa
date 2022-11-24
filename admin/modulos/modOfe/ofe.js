// Ejemplo inner join SELECT cursos.nombre, ofertas.titulo FROM ((rel_ofcu INNER JOIN ofertas ON ofertas.id_o = rel_ofcu.id_o) INNER JOIN cursos ON cursos.id_curso = rel_ofcu.id_c)
$(document).on('click','#estado-adit',function (){ 
var id = $(this).data("id");
var est = $(this).data("estado");
var rta = "";
Swal.fire({
  title: 'Actualizar estado?',
  showCancelButton: true,
  confirmButtonText: 'Actualizar'
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Actualizado!', '', 'success')
    setTimeout(function() {
      $.ajax({
        url:"modulos/modOfe/deshabilitar.php",
        type:"POST",
        data:{ 
        id:id,
        est:est
        },
        success: function(response) {
          console.log(response);
          window.location = "administrarOfertas.php";
    
        }
      });
    }, 800)
    
  }
})



});
var id_a;
$(document).on('click','#administrarCursos',function (){ 
    id_a = $(this).data('id');
});

$(document).on('click','#envio-rel',function (){
  var op = $("#opciones_edit").find('option:selected').attr('id');
  console.log(id_a),
  Swal.fire({
    title: 'Agregar curso?',
    showCancelButton: true,
    confirmButtonText: 'Enviar'
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      $.ajax({
      
        url:"modulos/modOfe/rel.php",
        type:"POST",
        data:{ 
        id:id_a,
        valor:op
        },
        success: function(response) {
          rta = JSON.parse(response);
          console.log(rta);
          if(rta == 1){
            Swal.fire('Curso ya cargado!', '', 'error')
          } else{
            Swal.fire('Agregado!', '', 'success')
            setTimeout(function() {
            window.location = "administrarOfertas.php";
            }, 800)
          }
        }
      });
    }
  });


});

$(document).on('click','#elim_of',function (){
  var elim_id = $(this).data('id');

  Swal.fire({
    title: 'Eliminar oferta?',
    showCancelButton: true,
    confirmButtonText: 'Eliminar',
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      Swal.fire('Eliminado!', '', 'success')
      setTimeout(function() {
      $.ajax({
      
        url:"modulos/modOfe/eliminar.php",
        type:"POST",
        data:{ 
        id:elim_id,
        },
        success: function(response) {
          console.log(response);
          window.location = "administrarOfertas.php";
        }
      });
    }, 800)
    }
  });
});

$(document).on('click','#astolfo',function (){
  var el = $("#opciones").find('option:selected').attr('id');

  Swal.fire({
    title: 'Eliminar curso?',
    showCancelButton: true,
    confirmButtonText: 'Enviar'
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      Swal.fire('Eliminado!', '', 'success')
      setTimeout(function() {
      $.ajax({
      
        url:"modulos/modOfe/elimCur.php",
        type:"POST",
        data:{ 
        id:el
        },
        success: function(response) {
          console.log(response);
          window.location = "administrarOfertas.php";
        }
      });
    }, 800)
    }
  });

});
