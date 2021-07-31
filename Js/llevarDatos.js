function loginExitoso() 
{
  $("#exitoError").removeAttr("hidden");
  $("#exitoError").removeAttr("class");
  $("#exitoError").attr("class","alert alert-success");
  $("#exitoError").text("Inicio de Session exitoso!");
  setTimeout(function(){  
  $("#divFormulario").attr("hidden","true");
  $("#exitoError").attr("hidden","true");
  $("#Opciones").load("../Php/botonesAccion.php");
  $("#datosDelFuncionario").load("../Php/datosFunc.php");
  $(".datos-y-notificaciones").removeAttr("hidden");
  },3000);
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
            //alert (respuesta);
        } else {
            loginFracaso();
            //alert(respuesta);
        }
    }
  });
});



  $("#btncheck1").on('click',function(){
    alert("Si precioneamos el primer botons");
  });




    
