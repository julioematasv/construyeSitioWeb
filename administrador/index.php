<?php
  if($_POST)
  {
    header('Location: inicio.php');
  }

 ?>

<!doctype html>
<html lang="es">
  <head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
      <div class="row my-5">

        <div class="col-md-4">
          <!-- Div vacio para desplazar al centro la card -->
        </div>

        <div class="col-md-4">  <!-- Div contenedor de la card -->

          <div class="card shadow"><!-- Div inicio de la card -->

            <div class="card-header text-center bg-primary text-white">
              <h2>Ingresar</h2>
            </div>
            <div class="card-body">
              
              <form method="post" action=""><!-- Inicio del formulario -->

              <div class = "form-group">

                <label for="exampleInputEmail1">Usuario</label>
                <input type="text" class="form-control" name="usuario" placeholder="Ingresa tu Usuario" autocomplete="off">
              
              </div>

              <div class="form-group">

                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" name="contrasenia" placeholder="Contraseña" autocomplete="off">
                <small id="emailHelp" class="form-text text-muted">Nunca comparta su contraseña con nadie más.</small>

              </div>
              
              <button type="submit" class="btn btn-primary">
                Entrar al administrador
              </button>

              </form><!-- fin del formulario -->
              
              

            </div>
            
          </div><!-- fin de la card -->

        </div><!-- fin contenedor de la card -->
        
      </div><!-- fin row -->

    </div><!-- fin container -->

  </body>
</html>