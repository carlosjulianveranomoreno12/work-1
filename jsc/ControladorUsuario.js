//Main doument
$(document).ready(function () {
  //Loguear usuario
  $('#login-form').submit(e => {
    e.preventDefault();
    console.log("click");
    $.ajax({
      url: 'php/consultarUsuario.php',
      type: 'POST',
      data: $('#login-form').serialize(),
      success: function traducirEntradaSync(response) {
        let data = JSON.parse(response);
        data.forEach(data => {
          if (!data.error) {
            console.log("ingreso correcto");
            
            location.href = "../index.php";
          } else {
            $("#resultLogin").html("<div class='alert alert-danger animated tada slow' role='alert'>No se encontraron coincidencias</div>");
          }
        });
      }
    })
  })

  $('#registro-form').submit(e => {
     e.preventDefault();
     console.log("click");
     $.ajax({
      url: 'php/registrarUsuario.php',
      type: 'POST',
      data: $('#registro-form').serialize(),
      success: function traducirEntradaSync(response) {
        if(response=="error"){
          $("#resultRegistro").html("<div class='alert alert-danger animated tada slow' role='alert'>Ha sucedido un error</div>");
        }else{
          if(response=="existe"){
            $("#resultRegistro").html("<div class='alert alert-warning animated tada slow' role='alert'>El correo de usuario ya existe</div>");
          }
          else if(response=="exito"){
           
            location.href = "../index.php";
            $("#resultRegistro").html("<div class='alert alert-warning animated tada slow' role='alert'>Usuario registrado satisfactoriamente</div>");
          }
        }
      }
    })
  });
});
