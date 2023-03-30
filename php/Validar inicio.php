<?php

$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];


include("connect_db.php"); //llamamos a la conexión de la base de datos
$consulta="SELECT * FROM lista WHERE correo='$correo' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if ($filas>0) {
header("location:inicio.html");


  }else {
  echo "Error en la autenticacion";
  }

mysqli_free_result($resultado);
mysqli_close($conexion);