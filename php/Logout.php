<?php
    session_start();
    if(isset($_SESSION['id_usuario'])==true or isset($_SESSION['nombre_usuario'])==true){
        session_destroy();
        header("location:../index.php");
    }
?>