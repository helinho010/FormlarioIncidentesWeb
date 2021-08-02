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



$("#guardarDatos").click(function(){
  $()
});