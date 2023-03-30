<?php
//Conexion a base de datos
	$host = "localhost";
	$servidor= "mysql:dbname=lista; host=127.0.0.1"; //Servidor de la base de datos
	$usuario= "root";
	$password= "";
	try{
	$pdo= new PDO ($servidor, $usuario, $password);
	echo 'Conecto.....';
	}
	catch(PDOException $e){
	echo 'No conecto'.$e->getMessage();
	}
	
?>