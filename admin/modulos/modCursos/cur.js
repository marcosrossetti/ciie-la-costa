$(document).on('click','#estado-adit',function (){ 
    var id = $(this).data("id");
    var est = $(this).data("estado");
    
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
            url:"modulos/modCursos/deshabilitarCurso.php",
            type:"POST",
            data:{ 
            id:id,
            est:est
            },
            success: function(response) {
              console.log(response);
              window.location = "administrarCursos.php";
        
            }
          });
        }, 800)
        
      }
    })
    });

    $(document).on('click','#elim_cu',function (){
        var elim_id = $(this).data('id');
      
        Swal.fire({
          title: 'Eliminar oferta?',
          showCancelButton: true,
          confirmButtonText: 'Eliminar',
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire('Eliminado!', '', 'success')
            setTimeout(function() {
            $.ajax({
            
              url:"modulos/modCursos/elimCurso.php",
              type:"POST",
              data:{ 
              id:elim_id
              },
              success: function(response) {
                console.log(response);
                window.location = "administrarCursos.php";
              }
            });
          }, 800)
          }
        });
      });
      
      