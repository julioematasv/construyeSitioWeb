
<?php
/* Inicio de la conexion a la base de datos  */
// Variables
$servername = "localhost";
$dbname = "sitio";
$usuario = "root";
$password = "Losmimes123";

try
{
$conexion = new PDO("mysql:host=$servername;dbname=$dbname", $usuario, $password);
}
catch (PDOException $e)
{
die($e->getMessage());
}

