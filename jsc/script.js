$(document).ready(function() {
    const $nombre = $("#nombre"),
        $correo = $("#correo"),
        $contraseña = $("#contraseña"),
        $btnEnviar = $("#btnEnviar");

    $btnEnviar.click(function() { //Se declara el id del boton registrar en el html para ejecutar la función 
        //Al hacer click en el boton el post hace un llamado a procesar.php para lograr validar los datos y poder enviarlos 
        $.post("php/procesar.php", {
            nombre: $nombre.val(),
            correo: $correo.val(),
            contraseña: $contraseña.val(),
        }, function(respuestaComoJson) {
            let respuesta = JSON.parse(respuestaComoJson);
            
        })
    });

});