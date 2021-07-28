function loginExitoso() 
{
  $("#exitoError").removeAttr("hidden");
  $("#exitoError").removeAttr("class");
  $("#exitoError").attr("class","alert alert-success");
  $("#exitoError").text("Inicio exitoso!");
  setTimeout(window.location.href="../Php/index.php", 10000);
}
function loginFracaso() 
{
  $("#exitoError").removeAttr("hidden");
  $("#exitoError").removeAttr("class");
  $("#exitoError").attr("class","alert alert-danger");
  $("#exitoError").text("hubo un error, por favor intente de nuevo!");
}

$("button").on("click", function (params) {
   var data = $('#formularioInicio').serialize(); 
   $.ajax({
    type: "POST",
    url: "../Php/verificacionDatosFormInic.php",
    data: data,
    success: function(respuesta){
        if (respuesta == 't') {
            loginExitoso();
        } else {
            loginFracaso();
        }
    }
  });
});


    
