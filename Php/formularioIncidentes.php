<?php
    require_once '../../sistemasdetickets/Php/BDConexion.php';
    include_once 'datosIniciales.php';
    session_start();
    function getCodigoFormulario()
    {
        $resultado = "0";
        try {
            $conx = new Conexionbd();  
            $conx-> setUsuario('helio');
            $conx-> setContrasenia('H3l10');
            $conx->setQuery("select obtenercodigodeformulario()");
            $conx-> RealizarConsulta();
            $row=pg_fetch_row($conx->getConsulta());
            $resultado = "".$row[0]+1;
            if(strlen($resultado)==3)
            {
            }elseif (strlen($resultado)==2) {
                $resultado = "0".$resultado;
            }else {
                $resultado = "00".$resultado;
            }
        } catch (\Throwable $th) { 
            $resultado = $th;
        }
       return $resultado;
    }
     
     if(!empty($_POST['codForm']))
      {
          echo "<input type='hidden' id='controlFormulario' value='$_POST[codForm]'>";
        try {
            /*$conx = new Conexionbd();  
            $conx-> setUsuario('helio');
            $conx-> setContrasenia('H3l10');
            $conx->setQuery("select * from incidentedeinformacionfuncionario where codigo = '$_POST[codForm]'");
            $conx-> RealizarConsulta();
            $respuesta1=pg_fetch_row($conx->getConsulta());
            $conx->setQuery("select * from incidentedeinformacionosi where codigo = '$_POST[codForm]'");
            $conx-> RealizarConsulta();
            $respuesta2=pg_fetch_row($conx->getConsulta());
            $conx->setQuery("select * from incidentedeinformacionti where codigo = '$_POST[codForm]'");
            $conx-> RealizarConsulta();
            $respuesta3=pg_fetch_row($conx->getConsulta());*/

            
        } catch (\Throwable $th) { 
            //$resultado = $th;
        }  
      }
    

    if ( count($_SESSION) > 0)
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../Css/bootstrap-grid.rtl.min.css">
    <link rel="stylesheet" href="../Css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../Css/bootstrap-reboot.rtl.min.css">
    <link rel="stylesheet" href="../Css/bootstrap-utilities.min.css">
    <link rel="stylesheet" href="../Css/bootstrap-utilities.rtl.min.css">
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../Css/index.css" media="screen" media="print">
    <link rel="shortcut icon" href="../Imagenes/iconoFormulario.png" type="image/x-icon">
    <script src="../Js/index.js"></script>
    <title>Formulario de Incidentes</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-11 formularioInicial">
                <div class="tituloFormulario text-center">
                    <h4>FORMULARIO DE INCIDENTES EN SEGURIDAD DE LA INFORMACION</h4>
                </div>
                <form action="" name="IncSegInf">
                    <div class="ContornoExterior">
                        <div class="container-fluid nivel0">
                            <div class="row text-center nivel1">
                                <div class="col-md-4 titulo">
                                    Cooperativa de Ahorro y Credito Societaria<br>
                                    "Solucredit" San Silvestre Ltda.
                                </div>
                                <div class="col-md-6 titulo" >
                                    <span id="Centrado">
                                        REPORTE DE INCIDENTES DE SEGURIDAD DE LA INFORMACION
                                    </span> 
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <span class="titulo">CODIGO:</span>
                                    </div>
                                    <div class="row" style="border-top: black 1px solid;">
                                        <span class="titulo" id="codigoFormulario">SOLUINC-2021-<?php echo getCodigoFormulario(); ?></span>
                                    </div>
                                </div>
                            </div>
                        <!--Nivel 2-->
                            <div class="row nivel2" id="n2">
                                <div class="col-md-1">
                                    <div class="row text-center rote">
                                        PARTE 1
                                    </div>
                                </div>
                                <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="titulo">REPORTE DEL INCIDENTE </span> <span class="titulo2">(El/la funcionario/a de la Cooperativa quien identifica el incidente llena los campos de esta primera parte)</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="text" class="visually-hidden" id="idFuncionario" maxlength="5" value="<?php echo $_SESSION['soluidFuncionario'];?>">
                                    <div class="col-md-1 titulo"><label for="fecha">Fecha:</label> </div>
                                    <div class="col-md-2 titulo2"><input type="date" name="fecha" id="fecha" maxlength="15" value="<?php echo date("Y-m-d");?>"  style="font-size: 10px;"></div>
                                    <div class="col-md-1 titulo"><label for="hora">Hora:</label> </div>
                                    <div class="col-md-3 titulo2"><input type="text"  name="hora" id="hora" maxlength="10" value="<?php echo date('H:m');?>"></div>
                                    <div class="col-md-1 titulo"><label for="oficina">Oficnica:</label> </div>
                                    <div class="col-md-4 titulo2"><input type="text" name="" id="oficina" maxlength="70" value="<?php echo $Oficna_inicial;?>"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 titulo"> <label for="reportado-por">Reportado por:</label></div>
                                    <div class="col-md-4 titulo2"><input type="text" name="reportado-por" id="reportado-por" maxlength="50" value="<?php echo $_SESSION['soluNombre']." ".$_SESSION['soluApPat']." ".$_SESSION['soluApMat'];?>"></div>
                                    <div class="col-md-1 titulo"><label for="cargo">Cargo:</label></div>
                                    <div class="col-md-5 titulo2"><input type="text" name="cargo" id="cargo" maxlength="70" value="<?php echo $_SESSION['soluCargo'];?>"></div>  
                                </div>
                                <div class="row">
                                    <textarea name="detalleInicidente" id="detalleIncidente" cols="30" rows="3" maxlength="300" placeholder="Detalle el evento registrado"></textarea>
                                </div>
                                </div>  
                            </div>
                        <!--Final Nivel-->
                        <!--Nivel 3-->
                        <div class="row nivel3" id="n3">
                            <div class="col-md-1">
                                <div class="row text-center rote">
                                    PARTE 2
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="titulo">ANALISIS Y REVISION DEL INCIDENTE</span> <span class="titulo2"> (La Unidad de Tecnologia de la Informacion llena los campos de esta segunda parte)</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5" style="border-right: black 1px solid;">
                                        <div class="row">
                                            <div class="col-md-12 text-center titulo">
                                                Origen del Incidente
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 3px; padding-bottom: 3px;">
                                            <div class="col-md-2 titulo"><label for="interno"> Interno:</label></div>
                                            <div class="col-md-4 text-center"><input type="text" maxlength="1" name="" id="interno" class="text-center" style="border: black 1px solid;" onkeypress="verificarCaracter(this)" onblur="verificarCasillas()"></div>
                                            <div class="col-md-2 titulo"><label for="externo"> Externo:</label></div>
                                            <div class="col-md-4 text-center"><input type="text" maxlength="1" name="" id="externo" class="text-center" style="border: black 1px solid;" onkeypress="verificarCaracter(this)" onblur="verificarCasillas()"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-12 text-center titulo">
                                                Prioridad
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 3px; padding-bottom: 5px;">
                                            <div class="col-md-1 titulo">Alto</div>
                                            <div class="col-md-3"><input type="text" maxlength="1" name="" id="prioridadAlto" class="text-center" style="border: black 1px solid;" onkeypress="verificarCaracter(this)"></div>
                                            <div class="col-md-1 text-center titulo">Medio</div>
                                            <div class="col-md-3"><input type="text" maxlength="1" name="" id="prioridadMedio" class="text-center" style="border: black 1px solid;" onkeypress="verificarCaracter(this)"></div>
                                            <div class="col-md-1 text-center titulo">Bajo</div>
                                            <div class="col-md-3"><input type="text" maxlength="1" name="" id="prioridadBajo" class="text-center" style="border: black 1px solid;" onkeypress="verificarCaracter(this)"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <textarea name="" id="revisionInicial" cols="30" rows="3" placeholder="Revision Incial"></textarea>
                                </div>
                            </div>
                        </div>
                        <!--Final Nivel 3-->

                        <!--Nivel 4-->
                        <div class="row" id="n4">
                            <div class="col-md-1">
                                <div class="row text-center rote">
                                    PARTE 3
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="titulo">SEGUIMIENTO</span> <span class="titulo2">(Esta tercera parte debe ser llenada por el Oficial de Seguridad de la Informacion y/o el Encargado de Tecnologia de la Informacion)</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="border-right: black 1px solid; ;">
                                        <div class="row">
                                        <label for="" style="font-size: 9px;">Realizado por:</label>
                                        <textarea name="" id="seguimientoOsi" cols="30" rows="2" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" style="font-size: 9px;">Realizado por:</label>  
                                            <textarea name="" id="seguimientoTi" cols="30" rows="2" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Final Nivel 4-->

                        <!--Nivel 5-->
                        <div class="row" id="n5">
                            <div class="col-md-1">
                                <div class="row text-center rote">
                                    PARTE 4
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="titulo">
                                            SOLUCION
                                        </span>
                                        <span class="titulo2">
                                            (Esta cuarta parte debe ser llenada por el Encargado de Tecnologia de la Informacion)
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                        <textarea name="" id="solucionTi" cols="30" rows="3" placeholder="Solucion que realizao el Encargado de Tecnolgia de la Informacion"></textarea>
                                </div>
                            </div>
                        </div>
                        <!--Final Nivel 5-->

                        <!--Nivel 6-->
                        <div class="row" id="n6">
                            <div class="col-md-1">
                                <div class="row text-center rote">
                                    PARTE 5
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="titulo">EVALUACION</span><span class="titulo2"> (Este punto debe ser llenado por el Oficial de Seguridad de la Informacion)</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label for="" style="font-size: 9px;">Nivel de Criticidad</label>
                                        </div>
                                        <div class="row text-center" style="padding: 7px;">
                                            <div class="col-md-1 titulo">ALTA</div>
                                            <div class="col-md-2"><input type="text" name="" id="" maxlength="1" style="border: black 1px solid; text-align: center;" onkeypress="verificarCaracter(this)"></div>
                                            <div class="col-md-1 titulo">MEDIA</div>
                                            <div class="col-md-2"><input type="text" name="" id="" maxlength="1" style="border: black 1px solid; text-align: center;" onkeypress="verificarCaracter(this)"></div>
                                            <div class="col-md-1 titulo">BAJA</div>
                                            <div class="col-md-2"><input type="text" name="" id="" maxlength="1" style="border: black 1px solid; text-align: center;" onkeypress="verificarCaracter(this)"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center" style="padding-left: 5px; margin-bottom: 10px;">
                                    <label for="" class="titulo">Clasificacion de Incidentes de Seguridad</label>
                                    <div class="col-md-5 subtitulo text-start estiloCheckBox-Incidentes">
                                            <div class="row" >
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Perdida de servicio</div>
                                            </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Pérdida de equipo o instalaciones</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Sobrecargo o mal funcionamiento del sistema</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Errores humanos</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Incumplimiento de políticas o procedimientos</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Deficiencias de controles de seguridad física</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Cambios incontrolables en el sistema</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Mal funcionamiento del software</div>  
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Mal funcionamiento del hardware</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Código malicioso</div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 subtitulo text-start estiloCheckBox-Incidentes">
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Negación de servicio</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Errores resultantes de datos incompletos o no actualizados</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Violaciones en la confidencialidad e integridad de la información</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Mal uso de los sistemas de información</div>
                                        </div>
                                        <div class="row text-start">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Accesos no autorizados exitosos, sin perjuicios visibles a componentes tecnológicos</div>
                                        </div>
                                        <div class="row fluid">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Intentos recurrentes y no recurrentes de acceso no autorizado</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Ataques Externos o Internos</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Modificacion no Autorizada</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id=""></div>
                                            <div>Divulgacion de informacion sensible</div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row titulo">
                                    <div class="col-md-6">
                                        Impacto del Incidente
                                    </div>
                                    <div class="col-md-6">
                                            Activo(s) Afectado(s)
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <textarea name="" id="" cols="30" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <textarea name="" id="" cols="30" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Final Nivel 6-->

                        <!--Parte 7-->
                        <div class="row" id="n7"> 
                            <div class="col-md-1">
                                <div class="row text-centeper rote">
                                    PARTE 6
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="titulo"> ACCIONES A TOMAR PARA FUTUROS INCIDENTES </span> <span class="titulo2">(Esta parte debe ser llenada por el Oficial de Seguridad de la Informacion en coordinacion con las unidades involucradas)</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <textarea name="" id="" cols="30" rows="3"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 titulo text-center" style="border-top: black 1px solid;">
                                        RESPONSABLES DE LAS ACCIONES A TOMAR PARA EVITAR REPLICAS FUTURAS DEL INCIDENTE REPORTADO
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <textarea name="" id="" cols="30" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <textarea name="" id="" cols="30" rows="1"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <textarea name="" id="" cols="30" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <textarea name="" id="" cols="30" rows="1"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Final Parte 7-->
                        </div>

                        <!--Firmas-->
                        <div class="row text-center pieFirmas">
                            <div class="col-md-4">
                                    <hr>
                                    <span class="responsablesfirma">REPORTADOR(A) DEL INCIDENTE</span>
                            </div>
                            <div class="col-md-4">
                                <hr>
                                <span class="responsablesfirma">ENCARGADO DE TECNOLOGIA DE LA INFORMACION</span>
                            </div>
                            <div class="col-md-4">
                                <hr>
                                <span class="responsablesfirma">OFICIAL DE SEGURIDAD DE LA INFORMACION</span>
                            </div>
                        </div>
                        <!--Fianl Firmas-->
                    </div>
                </form>
            </div>
            <div class="col-md-1">
                <div class="btnsFormulario">
                    <button type="button" class="btn btn-success" id="guardarDatos" data-bs-toggle="modal" data-bs-target="#exampleModal">Guardar Datos</button>        
                    <button type="button" class="btn btn-warning" id="borrarDatos">Borrar datos</button>
                    <button type="button" class="btn btn-secondary" id="volverMenu" >Volver al menu</button>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmacion de datos</h5>
                <button type="button" class="btn-close text-start" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Esta seguro de guardar los cambios...?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="btnNo">No guardar cambios</button>
                <button type="button" class="btn btn-success" id="btnSi">Guardar Cambios</button>
            </div>
            </div>
        </div>
        </div>
    
<script src="../Js/jquery-3.6.0.min.js"></script>
<script src="../Js/bootstrap.min.js"></script>
<script src="../Js/controlFormulario.js"></script>    
<!--script src="../Js/bootstrap.esm.min.js"></script>
<script src="../Js/bootstrap.bundle.min.js"></script-->
</body>
</html>


<?php
    }else
    {
        header("Location: $urlraiz");
    }
?>
