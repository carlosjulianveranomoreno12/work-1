<?php
// Conectando, seleccionando la base de datos
require_once("conexion.php");
//Lammar clase de sesion
require("SessionData.php");
//Recibir Datos mediante metodo post
$correo = $_POST['email'];
$password=md5($_POST['password']);
//Declaracion del array de retorno de datos
$json = array();
//Declarar consulta a realizar
$sql = "SELECT id_usuario,nombre_usuario FROM usuario WHERE correo_usuario='$correo' AND contrasenia_usuario='$password'";
//Ejecutar Consulta
$result = mysqli_query($con, $sql) or die("Error al consultar");
if ($result->num_rows == 1) {
    //Construccion de array
    $datos = $result->fetch_assoc();
    //Agregar datos al array
    $json[] = array(
        'error' => false
    );
    //Convertir json a string
    $jsonstring = json_encode($json);
    //Retornar array con los datos consultados
    echo $jsonstring;
    //asignar datos a sesion();
    $_SESSION['nombre_usuario']=$datos['nombre_usuario'];
    $_SESSION['id_usuario']=$datos['id_usuario'];
    

} else {
    //Agregar datos al array
    $json[] = array(
        'error' => true
    );
    //Convertir json a string
    $jsonstring = json_encode($json);
    //Retornar array con los datos consultados
    echo $jsonstring;
}
?>