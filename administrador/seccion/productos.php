<?php include("../template/cabecera.php");  ?>
<?php

$txtID=(isset($_POST["txtID"])) ? $_POST["txtID"] :"";
$txtNombre=(isset($_POST["txtNombre"])) ? $_POST["txtNombre"] :"";
$txtImagen=(isset($_FILES["txtImagen"]["name"])) ? $_FILES["txtImagen"]["name"] :"";
$accion=(isset($_POST["accion"])) ? $_POST["accion"] :"";


include ("../config/bd.php");
switch ($accion)
{
  case "Agregar":
    $sentenciaSQL = $conexion->prepare("INSERT INTO libros (nombre,imagen) VALUES (:nombre,:imagen);");
    $sentenciaSQL->bindParam(':nombre',$txtNombre);

    $fecha = new DateTime();
    $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

    $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

    if($txtImagen!=""){
      move_uploaded_file($tmpImagen,"../../img".$nombreArchivo);
    }

    $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
    $sentenciaSQL->execute();

    header("Location:productos.php");
    break;

  case "Modificar":
      $sentenciaSQL= $conexion->prepare("UPDATE libros SET nombre=:nombre WHERE id=:id");
      $sentenciaSQL->bindParam(':nombre',$txtNombre);
      $sentenciaSQL->bindParam(':id',$txtID);
      $sentenciaSQL->execute();
      
      if($txtImagen!=""){

          $fecha= new DateTime();
          $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
          
          $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

          move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

          $sentenciaSQL= $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
          $sentenciaSQL->bindParam(':id',$txtID);
          $sentenciaSQL->execute();
          $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
          
          if( isset($libro["imagen"]) &&($libro["imagen"]!="imagen.jpg") ){

              if(file_exists("../../img/".$libro["imagen"])){

                  unlink("../../img/".$libro["imagen"]);
              }

          }

          $sentenciaSQL= $conexion->prepare("UPDATE libros SET imagen=:imagen WHERE id=:id");
          $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
          $sentenciaSQL->bindParam(':id',$txtID);
          $sentenciaSQL->execute();
      }
      header("Location:productos.php");
      break;

  case "Cancelar":
    header("Location:productos.php");
    break;

  case "Seleccionar":
      $sentenciaSQL = $conexion->prepare("SELECT * FROM libros WHERE id=:id");
      $sentenciaSQL->bindParam(':id',$txtID);
      $sentenciaSQL->execute();
      $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

      $txtNombre=$libro['nombre'];
      $txtImagen=$libro['imagen'];
    //echo "Presionado boton Seleccionar";
    break;

  case "Borrar":

      $sentenciaSQL = $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
      $sentenciaSQL->bindParam(':id',$txtID);
      $sentenciaSQL->execute();
      $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

      if(isset($libro["imagen"]) && ($libro["imagen"]!="imagen.jpg"))
        {
          if(file_exists("../../img/".$libro["imagen"]))
          {
            unlink("../../img/".$libro["imagen"]);
          }
        }

      $sentenciaSQL = $conexion->prepare("DELETE FROM libros WHERE id=:id");
      $sentenciaSQL->bindParam(':id',$txtID);
      $sentenciaSQL->execute();

      header("Location:productos.php");
    break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM libros");
$sentenciaSQL->execute();
$listaLibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

    <div class="col-md-5"><!-- Inicio col md 5  -->


      <div class="card"><!-- Inicio del card  -->

        <div class="card-header bg-secondary text-white"><!-- Inicio del card header  -->
          Datos de Libro:
        </div><!-- final del card header  -->

        <div class="card-body"><!-- Inicio del card body  -->

          <form method="POST" enctype="multipart/form-data" class="shadow px-3 py-3"><!-- Inicio del formulario  -->

            <div class = "form-group"><!-- Inicio primer form group  -->
              <label for="txtID">ID:</label><!--   -->
              <input type="text" required readonly="readonly" class="form-control" value="<?php echo $txtID; ?>" id="txtID" placeholder="Enter ID"><!--   -->
            </div><!-- final primer form group  -->

            <div class="form-group"><!-- Inicio segundo form group  -->
              <label for="txtNombre">Nombre:</label>
              <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre de Libro">
            </div><!-- final segundo form group  -->

            <div class="form-group"><!-- Inicio tercer form group  -->
              <label for="txtImagen">Imagen:</label>
              <br>

                <?php
                if($txtImagen!=""){
                ?>

                   <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen; ?>" width="50" alt="IMG">

                <?php 
                  }
                ?>
              <input type="file" class="form-control" name="txtImagen" id="txtImagen">
            </div><!-- final tercer form group  -->

            <div class="btn-group" role="group" aria-label=""><!-- Inicio Botonera  -->
              <button type="submit" name="accion" <?php echo($accion=="Seleccionar")?"disabled":"" ;?> value="Agregar" class="btn btn-success">Agregar</button>
              <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":"" ;?> value="Modificar" class="btn btn-warning">Modificar</button>
              <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":"" ;?> value="Cancelar" class="btn btn-info">Cancelar</button>
            </div><!-- final Botonera  -->

          </form><!-- Final del formulario  -->

        </div><!-- final del card body  -->

        <div class="card-footer bg-secondary text-white"><!-- Inicio del card footer  -->
          Desde aquí gestionas los datos de los libros.
        </div><!-- final del card footer  -->

      </div><!-- final del card  -->
      
      
    </div><!-- final col md 5  -->

    <div class="col-md-7"><!-- Inicio col md 7  -->

      <table class="table table table-striped table-bordered table-hover"><!-- Inicio tabla  -->

        <thead><!-- Cabecera tabla  -->
          <tr>
            <th>ID Libros</th>
            <th>Nombre Libro</th>
            <th>Imagen Libro</th>
            <th>Acciones</th>
          </tr>
        </thead><!-- final cabecera tabla  -->

        <tbody><!-- Inicio cuerpo tabla  -->
        <?php foreach ($listaLibros as $libro) { ?>
          <tr>
            <td><?php echo $libro['id']; ?></td>
            <td><?php echo $libro['nombre']; ?></td>

            <td>

              <img class="img-thumbnail rounded" src="../../img/<?php echo $libro['imagen']; ?>" width="50" alt="IMG">
            
            </td>

            <td>
                <form  method="post">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $libro['id']; ?>">

                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-success" />

                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
                </form>
            </td>
              
          </tr>
        <?php } ?>

        </tbody><!-- final cuerpo tabla  -->

      </table><!-- final tabla  -->

    </div><!-- final col md 7  -->

<?php include("../template/footer.php");  ?>