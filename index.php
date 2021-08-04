<?php
 include_once 'Php/funcionesPrincipales.php';
 date_default_timezone_set('America/La_Paz');
 session_start();
// print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="Css/bootstrap-grid.rtl.min.css">
    <link rel="stylesheet" href="Css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="Css/bootstrap-reboot.rtl.min.css">
    <link rel="stylesheet" href="Css/bootstrap-utilities.min.css">
    <link rel="stylesheet" href="Css/bootstrap-utilities.rtl.min.css">
    <link rel="stylesheet" href="Css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="login/Css/estilosLogin.css">
    <script src="Js/jquery-3.6.0.min.js"></script>
    <title>Inicio de Session</title>
</head>
<body>
    <div class="contenedorFormulario" id="divFormulario">
        <div class="contenedorFormularioInterno">
            <form class="form-control" id="formularioInicio">
                    <p class="text-center">Formulario de Inicidentes en Seguridad de la Informacion</p>
                    <div class="text-center">
                        <img src="login/Imagen/user.png" alt="imagen de usuario">
                    </div>
                    <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="usuario" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput" >Usuario</label>
                    </div>
                    <div class="form-floating">
                    <input type="password" class="form-control" name="contrasenia" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Contrasenia</label>
                    </div>
                    <div class="botones">
                     <button type="button" class="btn btn-primary">Iniciar Session</button>   
                    </div>
                </form>
        </div>   
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
                <div class="alert alert-success" id="exitoError" role="alert" hidden></div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="container-fluid datos-y-notificaciones" hidden="true">
        <div class="row">
            <span class="text-center"><h4>Datos personales y notificaciones</h4></span>
            <div class="col-md-5">
                <div class="datosPersonalesFun" id="datosDelFuncionario">
                    
                </div>
            </div>
            <div class="col-md-7 notificacionesButton">
                <div class="row">
                    <div class="" id="Opciones">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="resultados scrollParaMostrar" id="reporteDeFormularios">
                            
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    
    <footer>
        <div class="row">
            <div class="col-md-12">
                Cooperativa de Ahorro y Credito Societaria San Silvestre Ltda. <br>
                Unidad de Seguridad de la Informacion y Seguridad Fisica <br>
            </div>
            <div>
                <img src="login/Imagen/escudo2.png" alt="escudo osi">
            </div>
        </div>
    </footer>
    <?php
        if(count($_SESSION)>0)
        {
         echo '
         <script>
         $("#exitoError").removeAttr("hidden");
         $("#exitoError").removeAttr("class");
         $("#exitoError").attr("class","alert alert-success");
         $("#exitoError").text("Inicio de Session exitoso!"); 
         $("#divFormulario").attr("hidden","true");
         $("#exitoError").attr("hidden","true");
         $("#Opciones").load("../Php/botonesAccion.php");
         $("#datosDelFuncionario").load("../Php/datosFunc.php");
         $("#reporteDeFormularios").load("../Php/reporteIncidentesLlenados.php");
         $(".datos-y-notificaciones").removeAttr("hidden");
         </script>
         ';   
        }
    ?>
<script src="Js/llevarDatos.js"></script>
</body>
</html>