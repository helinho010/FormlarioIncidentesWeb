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
    $valorInput = !empty($_POST['codForm'])? $_POST['codForm']:0;
    $codForm = !empty($_POST['codForm'])? $_POST['codForm']:"SOLUINC-2021-".getCodigoFormulario();
    echo "<input type='text' id='controlFormulario' value='$valorInput' hidden='true' >";
    echo "<input type='text' id='controlFormulariocargo' value='$_SESSION[soluCargo]' hidden='true'>";
     if(!empty($_POST['codForm']))
      {
        try {
            $conx = new Conexionbd();  
            $conx-> setUsuario('helio');
            $conx-> setContrasenia('H3l10');
            $conx->setQuery("select * from incidentedeinformacionfuncionario where codigo = '$_POST[codForm]'");
            $conx-> RealizarConsulta();
            $respuesta1=pg_fetch_row($conx->getConsulta());
            //print_r($respuesta1);
            $conx->setQuery("select * from incidentedeinformacionosi where codigoForm = '$_POST[codForm]'");
            $conx-> RealizarConsulta();
            $respuesta2=pg_fetch_row($conx->getConsulta());
            //print_r($respuesta2);
            $conx->setQuery("select * from incidentedeinformacionti where codigoForm = '$_POST[codForm]'");
            $conx-> RealizarConsulta();
            $respuesta3=pg_fetch_row($conx->getConsulta());
            //print_r($respuesta3);
        } catch (\Throwable $th) { 
            //$resultado = $th;
        }  
      }
      $fechaFormulario = !empty($_POST['codForm'])?$respuesta1[3]:date("Y-m-d");
      $horaFormulario = !empty($_POST['codForm'])?$respuesta1[4]:date('H:m');
      $oficinaFormulario = !empty($_POST['codForm'])?$respuesta1[5]:$Oficna_inicial;
      $reportadoPorFormulario = !empty($_POST['codForm'])?$respuesta1[6]:$_SESSION['soluNombre']." ".$_SESSION['soluApPat']." ".$_SESSION['soluApMat'];
      $cargoFormulario = !empty($_POST['codForm'])?$respuesta1[7]:$_SESSION['soluCargo'];
      $detalleIncidenteFormulario = !empty($_POST['codForm'])?$respuesta1[8]:"";
      $origenIncidenteInterno = !empty($_POST['codForm'])?$respuesta3[2]:"";
      $origenIncidenteExterno = !empty($_POST['codForm'])?$respuesta3[3]:"";
      $prioridadAlto = !empty($_POST['codForm'])?$respuesta3[4]:"";
      $prioridadMedio = !empty($_POST['codForm'])?$respuesta3[5]:"";
      $prioridadBajo =!empty($_POST['codForm'])?$respuesta3[6]:"";
      $seguimientoTi = !empty($_POST['codForm'])?$respuesta3[8]:"";
      $revisionInicidenteInicial = !empty($_POST['codForm'])?$respuesta3[7]:"";
      $seguimientoOsi = !empty($_POST['codForm'])?$respuesta2[2]:"";
      $solucionTi = !empty($_POST['codForm'])?$respuesta3[9]:"";
      $criticidadAlta = !empty($_POST['codForm'])?$respuesta2[3]:"";
      $criticidadMedia = !empty($_POST['codForm'])?$respuesta2[4]:"";
      $criticidadBaja = !empty($_POST['codForm'])?$respuesta2[5]:"";
      if ( !empty($_POST['codForm']) ) {
        $inicio = 0;
        for ($i=6; $i < count($respuesta2) && $i <= 24; $i++) 
        { 
            if ( $respuesta2[$i] == 't')
            {
                $clasificacionIncidenteList[$inicio] = "checked";    
            }else{
            }
            $inicio++;
        }
      }else{
        $clasificacionIncidenteList = array();
      }
      $impactoIncidente = !empty($_POST['codForm'])?$respuesta2[25]:"";
      $activosAfectados = !empty($_POST['codForm'])?$respuesta2[26]:"";
      $accionesFuturas = !empty($_POST['codForm'])?$respuesta2[27]:"";
      $responsableDeAcciones1 = !empty($_POST['codForm'])?$respuesta2[28]:"";
      $responsableDeAcciones2 = !empty($_POST['codForm'])?$respuesta2[29]:"";
      $responsableDeAcciones3 = !empty($_POST['codForm'])?$respuesta2[30]:"";
      $responsableDeAcciones4 = !empty($_POST['codForm'])?$respuesta2[31]:"";


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
                                        <span class="titulo">CODIGO</span>
                                    </div>
                                    <div class="row" style="border-top: black 1px solid;">
                                        <span class="titulo" id="codigoFormulario"><?php echo $codForm;?></span>
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
                                    <div class="col-md-2 titulo2"><input type="date" name="fecha" id="fecha" maxlength="15" value="<?php echo $fechaFormulario;?>"  style="font-size: 10px;"></div>
                                    <div class="col-md-1 titulo"><label for="hora">Hora:</label> </div>
                                    <div class="col-md-3 titulo2"><input type="text"  name="hora" id="hora" maxlength="10" value="<?php echo $horaFormulario;?>"></div>
                                    <div class="col-md-1 titulo"><label for="oficina">Oficnica:</label> </div>
                                    <div class="col-md-4 titulo2"><input type="text" name="" id="oficina" maxlength="70" value="<?php echo $oficinaFormulario;?>"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 titulo"> <label for="reportado-por">Reportado por:</label></div>
                                    <div class="col-md-4 titulo2"><input type="text" name="reportado-por" id="reportado-por" maxlength="50" value="<?php echo $reportadoPorFormulario;?>"></div>
                                    <div class="col-md-1 titulo"><label for="cargo">Cargo:</label></div>
                                    <div class="col-md-5 titulo2"><input type="text" name="cargo" id="cargo" maxlength="70" value="<?php echo $cargoFormulario;?>" readonly></div>  
                                </div>
                                <div class="row">
                                    <textarea name="detalleInicidente" id="detalleIncidente" cols="30" rows="3" maxlength="300" placeholder="Detalle el evento registrado"><?php echo $detalleIncidenteFormulario;?></textarea>
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
                                            <div class="col-md-4 text-center"><input type="text" value ="<?php echo $origenIncidenteInterno?>" maxlength="1" name="" id="interno" class="text-center" style="border: black 1px solid;" onkeypress="verificarCaracter(this)" onblur="verificarCasillas()"></div>
                                            <div class="col-md-2 titulo"><label for="externo"> Externo:</label></div>
                                            <div class="col-md-4 text-center"><input type="text" value="<?php echo $origenIncidenteExterno?>" maxlength="1" name="" id="externo" class="text-center" style="border: black 1px solid;" onkeypress="verificarCaracter(this)" onblur="verificarCasillas()"></div>
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
                                            <div class="col-md-3"><input type="text" value="<?php echo $prioridadAlto?>" maxlength="1" name="" id="prioridadAlto" class="text-center" style="border: black 1px solid;" onkeypress="verificarCaracter(this)"></div>
                                            <div class="col-md-1 text-center titulo">Medio</div>
                                            <div class="col-md-3"><input type="text" value="<?php echo $prioridadMedio?>" maxlength="1" name="" id="prioridadMedio" class="text-center" style="border: black 1px solid;" onkeypress="verificarCaracter(this)"></div>
                                            <div class="col-md-1 text-center titulo">Bajo</div>
                                            <div class="col-md-3"><input type="text" value="<?php echo $prioridadBajo?>" maxlength="1" name="" id="prioridadBajo" class="text-center" style="border: black 1px solid;" onkeypress="verificarCaracter(this)"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <textarea name="" id="revisionInicial" cols="30" rows="3" placeholder="Revision Incial"><?php echo $revisionInicidenteInicial?></textarea>
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
                                    <div class="col-md-6" id="lugarOsi" style="border-right: black 1px solid; ;">
                                        <div class="row">
                                        <label for="" style="font-size: 9px;">Realizado por:</label>
                                        <textarea name="" id="seguimientoOsi" cols="30" rows="2" placeholder=""><?php echo $seguimientoOsi?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="lugarTi">
                                        <div class="row">
                                            <label for="" style="font-size: 9px;">Realizado por:</label>  
                                            <textarea name="" id="seguimientoTi" cols="30" rows="2" placeholder=""><?php echo $seguimientoTi?></textarea>
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
                                        <textarea name="" id="solucionTi" cols="30" rows="3" placeholder="Solucion que realizao el Encargado de Tecnolgia de la Informacion"><?php echo $solucionTi;?></textarea>
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
                                            <div class="col-md-2"><input type="text" value="<?php echo $criticidadAlta?>" name="" id="criticidadAlta" maxlength="1" style="border: black 1px solid; text-align: center;" onkeypress="verificarCaracter(this)"></div>
                                            <div class="col-md-1 titulo">MEDIA</div>
                                            <div class="col-md-2"><input type="text" value="<?php echo $criticidadMedia?>" name="" id="criticidadMedia" maxlength="1" style="border: black 1px solid; text-align: center;" onkeypress="verificarCaracter(this)"></div>
                                            <div class="col-md-1 titulo">BAJA</div>
                                            <div class="col-md-2"><input type="text" value="<?php echo $criticidadBaja?>" name="" id="criticidadBaja" maxlength="1" style="border: black 1px solid; text-align: center;" onkeypress="verificarCaracter(this)"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center" style="padding-left: 5px; margin-bottom: 10px;">
                                    <label for="" class="titulo">Clasificacion de Incidentes de Seguridad</label>
                                    <div class="col-md-5 subtitulo text-start estiloCheckBox-Incidentes">
                                            <div class="row" >
                                            <div><input type="checkbox" name="" id="perdidaServicio" <?php echo $clasificacionIncidenteList[0];?>></div>
                                            <div>Perdida de servicio</div>
                                            </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="perdidaDeEquipoInstalciones" <?php echo $clasificacionIncidenteList[1];?>></div>
                                            <div>Pérdida de equipo o instalaciones</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="sobrecargoMalFuncionamientoSistema" <?php echo $clasificacionIncidenteList[2];?>></div>
                                            <div>Sobrecargo o mal funcionamiento del sistema</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="erroresHumanos" <?php echo $clasificacionIncidenteList[3];?>></div>
                                            <div>Errores humanos</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="incumplimientoDePolitcas" <?php echo $clasificacionIncidenteList[4];?>></div>
                                            <div>Incumplimiento de políticas o procedimientos</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="deficienciasControlesSeguridad" <?php echo $clasificacionIncidenteList[5];?>></div>
                                            <div>Deficiencias de controles de seguridad física</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="cambiosSistema" <?php echo $clasificacionIncidenteList[6];?>></div>
                                            <div>Cambios incontrolables en el sistema</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="malFuncionamientoSoftware" <?php echo $clasificacionIncidenteList[7];?>></div>
                                            <div>Mal funcionamiento del software</div>  
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="malFuncionamientoHardware" <?php echo $clasificacionIncidenteList[8];?>></div>
                                            <div>Mal funcionamiento del hardware</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="codigoMalicioso" <?php echo $clasificacionIncidenteList[9];?>></div>
                                            <div>Código malicioso</div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 subtitulo text-start estiloCheckBox-Incidentes">
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="negacionServicios" <?php echo $clasificacionIncidenteList[10];?>></div>
                                            <div>Negación de servicio</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="erroresDatosIncompletosNoActualizados" <?php echo $clasificacionIncidenteList[11];?>></div>
                                            <div>Errores resultantes de datos incompletos o no actualizados</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="violacionesIC" <?php echo $clasificacionIncidenteList[12];?>></div>
                                            <div>Violaciones en la confidencialidad e integridad de la información</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="malUsoSistemasInf" <?php echo $clasificacionIncidenteList[13];?>></div>
                                            <div>Mal uso de los sistemas de información</div>
                                        </div>
                                        <div class="row text-start">
                                            <div><input type="checkbox" name="" id="accesosNoAutorizadosExitosos" <?php echo $clasificacionIncidenteList[14];?>></div>
                                            <div>Accesos no autorizados exitosos, sin perjuicios visibles a componentes tecnológicos</div>
                                        </div>
                                        <div class="row fluid">
                                            <div><input type="checkbox" name="" id="intentosRecurrentesDeAccesosNoAutorizados" <?php echo $clasificacionIncidenteList[15];?>></div>
                                            <div>Intentos recurrentes y no recurrentes de acceso no autorizado</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="ataquesIntExt" <?php echo $clasificacionIncidenteList[16];?>></div>
                                            <div>Ataques Externos o Internos</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="modificacionesNoAutorizadas" <?php echo $clasificacionIncidenteList[17];?>></div>
                                            <div>Modificacion no Autorizada</div>
                                        </div>
                                        <div class="row">
                                            <div><input type="checkbox" name="" id="divulgacionInformacionSensible" <?php echo $clasificacionIncidenteList[18];?>></div>
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
                                            <textarea name="" id="inpactoIncidente" cols="30" rows="2"><?php echo $impactoIncidente;?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <textarea name="" id="activosAfectados" cols="30" rows="2"><?php echo $activosAfectados?></textarea>
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
                                    <textarea name="" id="accionesFuturasAtomar" cols="30" rows="3"><?php echo $accionesFuturas?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 titulo text-center" style="border-top: black 1px solid;">
                                        RESPONSABLES DE LAS ACCIONES A TOMAR PARA EVITAR REPLICAS FUTURAS DEL INCIDENTE REPORTADO
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <textarea name="" id="responsable1" cols="30" rows="1"><?php echo $responsableDeAcciones1?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <textarea name="" id="responsable2" cols="30" rows="1"><?php echo $responsableDeAcciones2?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <textarea name="" id="responsable3" cols="30" rows="1"><?php echo $responsableDeAcciones3?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <textarea name="" id="responsable4" cols="30" rows="1"><?php echo $responsableDeAcciones4?></textarea>
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
