function HabilitadoParaEditar() 
{
  var cargoFuncionario = $("#controlFormulariocargo").val();
  if (cargoFuncionario.toLowerCase() != "osi" && cargoFuncionario.toLowerCase() != "ti") {
      $("#n2").addClass("disableDiv");
      $("#n3").addClass("disableDiv");
      $("#n4").addClass("disableDiv");
      $("#n5").addClass("disableDiv");
      $("#n6").addClass("disableDiv");
      $("#n7").addClass("disableDiv");
      $("#guardarDatos").attr("disabled");
  }
  else{
    if (cargoFuncionario.toLowerCase() == "osi") {
      $("#n2").addClass("disableDiv");
      $("#n3").addClass("disableDiv");
      $("#n5").addClass("disableDiv");
      $("#lugarTi").addClass("disableDiv");
    }else{
      if(cargoFuncionario.toLowerCase() == "ti"){
        $("#n2").addClass("disableDiv");
        $("#n6").addClass("disableDiv");
        $("#n7").addClass("disableDiv");
        $("#lugarOsi").addClass("disableDiv");
      }else{

      }
    }
  }
}

function HabilitadoInicial() 
{
      $("#n3").addClass("disableDiv");
      $("#n4").addClass("disableDiv");
      $("#n5").addClass("disableDiv");
      $("#n6").addClass("disableDiv");
      $("#n7").addClass("disableDiv");
}


$("#guardarDatos").click(function(){
   if (($('#controlFormulariocargo').val()).toLowerCase() != "osi" && ($('#controlFormulariocargo').val()).toLowerCase() != "ti" ) {
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
                window.location.href = "http://192.168.2.52:2402/"; 
              }else{
                alert("Los datos no fueron almacenados!" + respuesta);
              }
            }
          });
        }else{
        } 
      });
     
   }else{
     if(($('#controlFormulariocargo').val()).toLowerCase() == "ti")
     {
        var codigoFormulario = $("#controlFormulario").val();
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
          "codigoFormulario": codigoFormulario,
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
                if (respuesta == 1) {
                  alert("Datos almacenados exitosamente");
                  window.location.href = "http://192.168.2.52:2402/"; 
                }else{
                  alert("Los datos no fueron almacenados!" + respuesta);
                }
              }
            });
          }else{
          } 
        });
     }else{
      if (($('#controlFormulariocargo').val()).toLowerCase() == "osi"){ 
            var datos = {
            "control":3,
            "codigoFormulario": codigoFormulario
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
                    window.location.href = "http://192.168.2.52:2402/"; 
                  }else{
                    alert("Los datos no fueron almacenados!" + respuesta);
                  }
                }
              });
            }else{
            } 
          });
      }else{

      }
     }
   }
});


/*
* Control para mostrar el formulario (con inputs no habilitados), derivados desde el boton llenar formulario
* o editar
*/
$(document).ready(function(){
  if ($("#controlFormulario").val().length === 16)
  {
    HabilitadoParaEditar();
    
  }else{
    HabilitadoInicial();
           
  }
});

/*
* Boton de volver al menu
*/
$("#volverMenu").click(function(){
  window.location.href="http://192.168.2.52:2402/";
});



