/*function disableF5(e) 
{ 
  if ((e.which || e.keyCode) == 116) e.preventDefault(); 
}
$(document).bind("keydown", disableF5);
$(document).on("keydown", disableF5);*/

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


/*
* Funcion para cuando se preciona o se hace click en e boton cerrar
*/
  $(document).on('click',"#cerrarSession",function(){
    $.ajax({
      type: "POST",
      url: "../Php/cerrarSession.php",
      data: {'senial':1},
      success: function(respuesta){
          if (respuesta == 'ok') {
              console.log("Session Cerrada con exito");
              window.location.href="http://formulario.com.bo:2402/";
              //alert(respuesta);
        exit;
          } else {
              console.log("hubo un problema con la finalizacion de la session, intente mas tarde");
              //alert(respuesta);
          }
      }
    });
  });

  /*
  * Fin del al funcion cerrar Session
  */



  /*
  *Funcion para almacenar los datos modificados de los funcionarios
  */
    $(document).on("click","#modDatosFunc",function(){
      var nombre = $("#nombre").val();
      var ap_pat = $("#apPat").val();
      var ap_mat = $("#apMat").val();
      var ci = $("#ci").val(); 
      var cargo = $("#cargo").val();
      $.ajax({
        type: "POST",
        url: "../Php/verificacionDatosFormInic.php",
        data:{'dato': "datosFormularioInicidentes",
              'nombre':nombre,
              'ap_pat': ap_pat,
              'ap_mat': ap_mat,
              'ci': ci,
              'cargo': cargo},
        success:function(respuesta){
          alert (respuesta);
          setTimeout(function(){  
            $("#Opciones").load("../Php/botonesAccion.php");
            $("#datosDelFuncionario").load("../Php/datosFunc.php");
            $(".datos-y-notificaciones").removeAttr("hidden");
            },3000);
        }
      });
    });

  /*
  * Fin de la funcion almacenar datos
  */



  /*
  *Funcion para llenar formularios de incidentes en seguridad de la Informacion
  */
    $(document).on("click","#btncheck1",function(){
      window.location.href="http://formulario.com.bo:2402/Php/formularioIncidentes.php";
      //window.location.href="http://192.168.0.16:2402/Php/formularioIncidentes.php";
    });

/*
* Fin de la funcion para llenar un nuevo formulario de incidenes
*/







    
