function noHanilitadoParaEditar() 
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

function noHanilitadoInicial() 
{
      $("#n3").addClass("disableDiv");
      $("#n4").addClass("disableDiv");
      $("#n5").addClass("disableDiv");
      $("#n6").addClass("disableDiv");
      $("#n7").addClass("disableDiv");
}


$("#guardarDatos").click(function(){
   if (($('#cargo').val()).toLowerCase() != "osi" || ($('#cargo').val()).toLowerCase() != "ti" ) {
     var idFuncionario = $("#idFuncionario").val();
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
      "detalle":detalleIncidente,
      "idFuncionario": idFuncionario
    };
      $(document).on("click","button",function(event){
        if ($(this).attr("id") == "btnSi")
        {
          $.ajax({
            type: "POST",
            url: "../Php/almacenarDatosFormularioInc.php",
            data : datos,
            success: function(respuesta) {
              if (respuesta == 1) {
                alert("Datos almacenados exitosamente");
                window.location.href = "http://formulario.com.bo:2402/"; 
              }else{
                alert("Los datos no fueron almacenados!");
              }
            }
          });
        }else{
        } 
      });
     
   }else{
     if(($('#cargo').val()).toLowerCase() == "ti")
     {
        var OrigenIncidenteInterno=$("#interno").val();
        var OrigenIncidenteExterno=$("#externo").val();
        var PrioridadAlto=$("#prioridadAlto").val();
        var PrioridadMedio=$("#prioridadMedio").val();
        var PrioridadBajo=$("#prioridadBajo").val();
        var revisionInicialTi=$("#revisionInicial").val();
        var seguimientoTi=$("#seguimientoTi").val();
        var solucionTi=$("#solucionTi").val();
        var datos = {
          "control":2,
          "OrigenIncidenteInterno":OrigenIncidenteInterno,
          "OrigenIncidenteExterno":OrigenIncidenteExterno,
          "PrioridadAlto":PrioridadAlto,
          "PrioridadMedio":PrioridadMedio,
          "PrioridadBajo":PrioridadBajo,
          "revisionInicialTi":revisionInicialTi,
          "seguimientoTi":seguimientoTi,
          "solucionTi":solucionTi
        };
        $(document).on("click","button",function(event){
          if ($(this).attr("id") == "btnSi")
          {
            $.ajax({
              type: "POST",
              url: "../Php/almacenarDatosFormularioInc.php",
              data : datos,
              success: function(respuesta) {
                alert("Datos almacenados exitosamente");
                window.location.href = "http://formulario.com.bo:2402/";
              }
            });
          }else{
          } 
        });
     }else{
      if (($('#cargo').val()).toLowerCase() == "osi"){

      }else{

      }
     }
   }
   //alert(($('#cargo').val()).toLowerCase());
});


/*
* Control de donde se inicio el formulario, editar o el boton llenar formulario
*/
$(document).ready(function(){
  if ($("#controlFormulario").val() !="")
  {
    noHanilitadoParaEditar();
  }else{
    noHanilitadoInicial();
  }
});
