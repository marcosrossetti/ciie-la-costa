<?php
include('../../connection.php');
include('funciones.php');
 $id = $_GET['id'];
$sql = "SELECT * FROM `cursos` WHERE `id_curso`='$id'";
$sqlEX = mysqli_query($connection,$sql);
if($sqlEX){
    $row = mysqli_fetch_array($sqlEX);
    $horario = $row['horario'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <title>Editar Horario</title>
</head>
<body>

<div class="container">
      <div class="row p-4">
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <!-- FORM TO ADD TASKS -->
              <form id="cambiarHorario" method="POST" action="#?id= <?php echo $id;?>">
                <div class="form-group">
                  <input type="time" id="horario" name="nuevoH" placeholder="<?php echo $horario?>" class="form-control">
                </div>
                <button type="submit" name="submitH"  class="btn btn-primary btn-block text-center" onclick="<?php editarHorario() ?>">
                  Editar
                </button>
              </form>
            </div>
          </div>
        </div>
</div>
</div>

    
</body>
</html>