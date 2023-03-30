<?php
// Aquí podemos procesar los datos. Vienen dentro de $_POST
include("connect_db.php"); //llamamos a la conexión de la base de datos
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];

$pass=md5($pass); //Transformamos la Contraseña en formato md5
$sentencia= $pdo->prepare("INSERT INTO lista (id,nombre,correo,contraseña) VALUES ('','$nombre','$correo','$contraseña')"); //Insertamos los datos a la base de datos
			$sentencia->bindParam('nombre',$nombre);
			$sentencia->bindParam('correo',$correo);
			$sentencia->bindParam('contraseña',$contraseña);
			
			$sentencia->execute(); //Se ejecuta la Sentencia

echo json_encode("Formulario enviado"); //Se envia el Formulario

?>