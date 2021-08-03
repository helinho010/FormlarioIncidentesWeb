function noHanilitado() 
{
  var cargoFuncionario = $("#cargo").val();
  if (cargoFuncionario.toLowerCase() != "osi" && cargoFuncionario.toLowerCase() != "ti") {
      $("#n3").addClass("disableDiv");
      $("#n4").addClass("disableDiv");
      $("#n5").addClass("disableDiv");
      $("#n6").addClass("disableDiv");
      $("#n7").addClass("disableDiv");
  }
  else{
    if (cargoFuncionario.toLowerCase() == "osi") {
      $("#n2").addClass("disableDiv");
      $("#n3").addClass("disableDiv");
      $("#n5").addClass("disableDiv");
    }else{
      if(cargoFuncionario.toLowerCase() == "ti"){
        $("#n2").addClass("disableDiv");
        $("#n6").addClass("disableDiv");
        $("#n7").addClass("disableDiv");
      }else{

      }
    }
  }
}
noHanilitado();

$("#guardarDatos").click(function(){
   if (($('#cargo').val()).toLowerCase() != "osi" || ($('#cargo').val()).toLowerCase() != "ti" ) {
     var codigoIncidente=$("#codigoFormulario").text();
     var fechaInicidente = $("#fecha").val();
     var horaIncidente = $("#hora").val();
     var oficinaIncidente = $("#oficina").val();
     var reportadoDeIncidente = $("#reportado-por").val();
     var cargoFuncionario = $("#cargo").val();
     var detalleIncidente = $("#detalleIncidente").val();
     var datos = {
       "control":1,
       "codigo":codigoIncidente,
       "fecha":fechaInicidente,
      "hora":horaIncidente,
      "oficina":oficinaIncidente,
      "reportadoPor": reportadoDeIncidente,
      "cargo":cargoFuncionario,
      "detalle":detalleIncidente};
    $.ajax({
      type: "POST",
      url: "../Php/almacenarDatosFormularioInc.php",
      data : datos,
      success: function(respuesta) {
        alert("Datos almacenados exitosamente");
        window.location.href = "http://formulario.com.bo:2402/";
        
      }
    });

   }/*else{
     if(($('#cargo').val()).toLowerCase() == "ti")
     {

     }else{
      if (($('#cargo').val()).toLowerCase() == "osi"){

      }else{

      }
     }
   }*/
   //alert(($('#cargo').val()).toLowerCase());
});

