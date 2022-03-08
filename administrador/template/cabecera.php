<!doctype html>
<html lang="es">
  <head>
    <title>Inicio</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

<?php $url = "http://".$_SERVER['HTTP_HOST']."/Develoteca/construyeSitioWeb" ?>

    <nav class="nav justify-content-center bg-primary"><!-- inicio de nav -->

      <a class="nav-link active text-white" href="#">Administrador del sitio web</a>
      <a class="nav-link text-white" href="<?php echo $url; ?>/administrador/inicio.php">Inicio</a>
      <a class="nav-link text-white" href="<?php echo $url; ?>/administrador/seccion/productos.php">Libros</a>
      <a class="nav-link text-white" href="<?php echo $url; ?>/administrador/seccion/cerrar.php">Cerrar Sesión</a>
      <a class="nav-link text-white" href="<?php echo $url; ?>">Ver Sitio Web</a>

    </nav><!-- fin de nav -->

    <div class="container"><!-- Div inicio de container -->

      <div class="row my-5"><!-- Div inicio de row contenido -->