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
   if (($('#controlFormulariocargo').val()).toLowerCase() !== "osi" && ($('#controlFormulariocargo').val()).toLowerCase() !== "ti" ) 
   {
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
                alert("Los datos no fueron almacenados!, intentelo de nuevo o comuniquese con el Encargado de Tecnoligua de la Informacion" + respuesta);
              }
            }
          });
        }else{
        } 
      });
     
   }else{
     if(($('#controlFormulariocargo').val()).toLowerCase() === "ti")
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
      if (($('#controlFormulariocargo').val()).toLowerCase() === "osi"){ 
            var codigoFormulario = $("#controlFormulario").val();
            var seguimientoOsi= $("#seguimientoOsi").val();
            var evaluacionOsiAlta= $("#criticidadAlta").val();
            var evaluacionOsiMedia= $("#criticidadMedia").val();
            var evaluacionOsiBaja= $("#criticidadBaja").val();
            var perdidaDeservicio= $("#perdidaServicio").prop('checked');
            var perdidaDeEquipoOInstalaciones= $("#perdidaDeEquipoInstalciones").prop('checked');
            var sobrecargoMalFuncionamientoDelSistema= $("#sobrecargoMalFuncionamientoSistema").prop('checked');
            var erroresHumanos= $("#erroresHumanos").prop('checked');
            var inclumplimientoPoliticasProcedimientos= $("#incumplimientoDePolitcas").prop('checked');
            var deficienciasDeControlDeSeguridadFisica= $("#deficienciasControlesSeguridad").prop('checked');
            var cambiosIncontrolablesEnElSistema= $("#cambiosSistema").prop('checked');
            var malFuncionamientoDelHardware= $("#malFuncionamientoSoftware").prop('checked');
            var malFuncionamientoHardware= $("#malFuncionamientoHardware").prop('checked');
            var codigoMalicioso= $("#codigoMalicioso").prop('checked');
            var negacionDeServicios= $("#negacionServicios").prop('checked');
            var erroresIncompletosOnoActualizados= $("#erroresDatosIncompletosNoActualizados").prop('checked');
            var violacionesAlaConfidencialidadIntegridad= $("#violacionesIC").prop('checked');
            var malUsoDeLosSistemasDeInformacion= $("#malUsoSistemasInf").prop('checked');
            var accesosNoAutorizados= $("#accesosNoAutorizadosExitosos").prop('checked');
            var intentosRecurrentesNoRecurrentes= $("#intentosRecurrentesDeAccesosNoAutorizados").prop('checked');
            var ataquesInternosExternos= $("#ataquesIntExt").prop('checked');
            var modificacionNoAutorizada= $("#modificacionesNoAutorizadas").prop('checked');
            var divulgacionDeInfomracion= $("#divulgacionInformacionSensible").prop('checked');
            var inpactoIncidente= $("#inpactoIncidente").val();
            var activosAfectados= $("#activosAfectados").val();
            var accionesAtomarAFuturo= $("#accionesFuturasAtomar").val();
            var responsable1= $("#responsable1").val();
            var responsable2= $("#responsable2").val();
            var responsable3= $("#responsable3").val();
            var responsable4= $("#responsable4").val();
            var datos = {
            "control":3,
            "codigoFormulario": codigoFormulario,
            "seguimientoOsi":seguimientoOsi,
            "evaluacionOsiAlta":evaluacionOsiAlta,
            "evaluacionOsiMedia":evaluacionOsiMedia,
            "evaluacionOsiBaja":evaluacionOsiBaja,
            "perdidaDeservicio":perdidaDeservicio,
            "perdidaDeEquipoOInstalaciones":perdidaDeEquipoOInstalaciones,
            "sobrecargoMalFuncionamientoDelSistema":sobrecargoMalFuncionamientoDelSistema,
            "erroresHumanos":erroresHumanos,
            "inclumplimientoPoliticasProcedimientos":inclumplimientoPoliticasProcedimientos,
            "deficienciasDeControlDeSeguridadFisica":deficienciasDeControlDeSeguridadFisica,
            "cambiosIncontrolablesEnElSistema":cambiosIncontrolablesEnElSistema,
            "malFuncionamientoDelHardware":malFuncionamientoDelHardware,
            "malFuncionamientoHardware":malFuncionamientoHardware,
            "codigoMalicioso":codigoMalicioso,
            "negacionDeServicios":negacionDeServicios,
            "erroresIncompletosOnoActualizados":erroresIncompletosOnoActualizados,
            "violacionesAlaConfidencialidadIntegridad":violacionesAlaConfidencialidadIntegridad,
            "malUsoDeLosSistemasDeInformacion":malUsoDeLosSistemasDeInformacion,
            "accesosNoAutorizados":accesosNoAutorizados,
            "intentosRecurrentesNoRecurrentes":intentosRecurrentesNoRecurrentes,
            "ataquesInternosExternos":ataquesInternosExternos,
            "modificacionNoAutorizada":modificacionNoAutorizada,
            "divulgacionDeInfomracion":divulgacionDeInfomracion,
            "inpactoIncidente":inpactoIncidente,
            "activosAfectados":activosAfectados,
            "accionesAtomarAFuturo":accionesAtomarAFuturo,
            "responsable1":responsable1,
            "responsable2":responsable2,
            "responsable3":responsable3,
            "responsable4":responsable4 
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
                    alert("Los datos no fueron almacenados, intente mas tarde por favor" + respuesta);
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



