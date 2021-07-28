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
    <title>Inicio de Session</title>
</head>
<body>
    <div class="contenedorFormulario">
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
<script src="Js/jquery-3.6.0.min.js"></script>
<script src="Js/llevarDatos.js"></script>
</body>
</html>