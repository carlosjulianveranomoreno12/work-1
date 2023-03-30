<?php
// Conectando, seleccionando la base de datos
require_once("conexion.php");
//Traer el correo
$correo=$_POST['email'];
//Declaracion del array de retorno de datos
$json = array();
//Declarar consulta a realizar
$sql = "SELECT id_usuario FROM usuario WHERE correo_usuario='$correo';";
//Ejecutar Consulta
$result = mysqli_query($con, $sql) or die("Error al consultar");
if ($result->num_rows == 1) {
    echo "existe";
} else {
    //Recibir Datos mediante metodo post
    $usuario = $_POST['name'];
    //Encriptar contrasenia
    $password=md5($_POST['password']);
    //Declarar consulta
    $query = "INSERT INTO usuario(nombre_usuario,contrasenia_usuario,correo_usuario) VALUES ('$usuario','$password','$correo')";
    if ($con->query($query) === TRUE) {
        echo  "exito";
    }
    else {
        echo "error";
    }
        
}
