<?php include("../template/cabecera.php");  ?>

    <div class="col-md-5"><!-- Inicio col md 5  -->


      <div class="card"><!-- Inicio del card  -->

        <div class="card-header bg-secondary text-white"><!-- Inicio del card header  -->
          Datos de Libro:
        </div><!-- final del card header  -->

        <div class="card-body"><!-- Inicio del card body  -->

          <form method="POST" enctype="multipart/form-data" role="form" class="shadow px-3 py-3"><!-- Inicio del formulario  -->

            <div class = "form-group"><!-- Inicio primer form group  -->
              <label for="txtID">ID:</label><!--   -->
              <input type="text" class="form-control" id="txtID" placeholder="Enter ID"><!--   -->
            </div><!-- final primer form group  -->

            <div class="form-group"><!-- Inicio segundo form group  -->
              <label for="txtNombre">Nombre:</label>
              <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre de Libro">
            </div><!-- final segundo form group  -->

            <div class="form-group"><!-- Inicio tercer form group  -->
              <label for="txtImagen">Imagen:</label>
              <input type="file" class="form-control" name="txtImagen" id="txtImagen">
            </div><!-- final tercer form group  -->

            <div class="btn-group" role="group" aria-label=""><!-- Inicio Botonera  -->
              <button type="button" class="btn btn-success">Agregar</button>
              <button type="button" class="btn btn-warning">Modificar</button>
              <button type="button" class="btn btn-info">Cancelar</button>
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

          <tr>

            <td>5</td>
            <td>Aprende PHP</td>
            <td>imagen.jpg</td>
            <td>Seleccionar | Borrar</td>
          </tr>

        </tbody><!-- final cuerpo tabla  -->

      </table><!-- final tabla  -->

    </div><!-- final col md 7  -->

<?php include("../template/footer.php");  ?>