<?php
    require_once '../../sistemasdetickets/Php/BDConexion.php';
    include_once 'datosIniciales.php';
    session_start();
    $mensaje = false;
    if(count($_SESSION)>0 && $_POST['control'] == 1)
    {
        $codigo=$_POST['codigo'];
        $fecha=$_POST['fecha'];
        $hora=$_POST['hora'];
        $oficina=$_POST['oficina'];
        $reportadoPor=$_POST['reportadoPor'];
        $cargo=$_POST['cargo'];
        $datelleIncidente=$_POST['detalle'];
        $idFuncionario = $_POST['idFuncionario'];    
        try {
            $conx = new Conexionbd();  
            $conx-> setUsuario($usuariobd);
            $conx-> setContrasenia($contraseniabd);
            $conx->setQuery("insert into incidentedeinformacionfuncionario (id_func, codigo, fecha, hora, oficina, reportadoPor, cargo, datelleIncidente) values ('$idFuncionario','$codigo', '$fecha','$hora','$oficina','$reportadoPor', '$cargo', '$datelleIncidente');");
            $conx-> RealizarConsulta();
            $mensaje = true;
        } catch (\Throwable $th) {
            $mensaje = $th;
        }
    }elseif ( count($_SESSION)>0 && $_POST['control'] == 2 ) {
        $codigoIncidente = $_POST['codigoFormulario'];
        $OrigenIncidenteInterno=$_POST['OrigenIncidenteInterno'];
        $OrigenIncidenteExterno=$_POST['OrigenIncidenteExterno'];
        $PrioridadAlto=$_POST['PrioridadAlto'];
        $PrioridadMedio=$_POST['PrioridadMedio'];
        $PrioridadBajo=$_POST['PrioridadBajo'];
        $revisionInicialTi=$_POST['revisionInicialTi'];
        $seguimientoTi=$_POST['seguimientoTi'];
        $solucionTi=$_POST['solucionTi'];
        try {
            $conx = new Conexionbd();  
            $conx-> setUsuario($usuariobd);
            $conx-> setContrasenia($contraseniabd);
            $conx->setQuery("delete from incidentedeinformacionti where codigoForm = '$codigoIncidente'");
            $conx-> RealizarConsulta();
            $conx->setQuery("insert into incidentedeinformacionti (codigoForm, OrigenIncidenteInterno,Origenincidenteexterno,PrioridadAlto,PrioridadMedio,PrioridadBajo,revisionInicialTi,seguimientoTi,solucionTi) values ('$codigoIncidente','$OrigenIncidenteInterno','$OrigenIncidenteExterno','$PrioridadAlto','$PrioridadMedio','$PrioridadBajo','$revisionInicialTi','$seguimientoTi','$solucionTi')");
            $conx-> RealizarConsulta();
            $mensaje = true;
        } catch (\Throwable $th) {
            $mensaje = $th;
        }
    }elseif (count($_SESSION)>0 && $_POST['control'] == 3) {
        $codigoIncidente = $_POST['codigoFormulario'];
        $seguimientoOsi=$_POST['seguimientoOsi'];
        $evaluacionOsiAlta=$_POST['evaluacionOsiAlta'];
        $evaluacionOsiMedia=$_POST['evaluacionOsiMedia'];
        $evaluacionOsiBaja=$_POST['evaluacionOsiBaja'];
        $perdidaDeservicio=$_POST['perdidaDeservicio'];
        $perdidaDeEquipoOInstalaciones=$_POST['perdidaDeEquipoOInstalaciones'];
        $sobrecargoMalFuncionamientoDelSistema=$_POST['sobrecargoMalFuncionamientoDelSistema'];
        $erroresHumanos=$_POST['erroresHumanos'];
        $inclumplimientoPoliticasProcedimientos=$_POST['inclumplimientoPoliticasProcedimientos'];
        $deficienciasDeControlDeSeguridadFisica=$_POST['deficienciasDeControlDeSeguridadFisica'];
        $cambiosIncontrolablesEnElSistema=$_POST['cambiosIncontrolablesEnElSistema'];
        $malFuncionamientoDelHardware=$_POST['malFuncionamientoDelHardware'];
        $malFuncionamientoHardware=$_POST['malFuncionamientoHardware'];
        $codigoMalicioso=$_POST['codigoMalicioso'];
        $negacionDeServicios=$_POST['negacionDeServicios'];
        $erroresIncompletosOnoActualizados=$_POST['erroresIncompletosOnoActualizados'];
        $violacionesAlaConfidencialidadIntegridad=$_POST['violacionesAlaConfidencialidadIntegridad'];
        $malUsoDeLosSistemasDeInformacion=$_POST['malUsoDeLosSistemasDeInformacion'];
        $accesosNoAutorizados=$_POST['accesosNoAutorizados'];
        $intentosRecurrentesNoRecurrentes=$_POST['intentosRecurrentesNoRecurrentes'];
        $ataquesInternosExternos=$_POST['ataquesInternosExternos'];
        $modificacionNoAutorizada=$_POST['modificacionNoAutorizada'];
        $divulgacionDeInfomracion=$_POST['divulgacionDeInfomracion'];
        $inpactoIncidente=$_POST['inpactoIncidente'];
        $activosAfectados=$_POST['activosAfectados'];
        $accionesAtomarAFuturo=$_POST['accionesAtomarAFuturo'];
        $responsable1=$_POST['responsable1'];
        $responsable2=$_POST['responsable2'];
        $responsable3=$_POST['responsable3'];
        $responsable4=$_POST['responsable4'];
        try {
            $conx = new Conexionbd();  
            $conx-> setUsuario($usuariobd);
            $conx-> setContrasenia($contraseniabd);
            $conx->setQuery("delete from incidentedeinformacionosi where codigoForm = '$codigoIncidente'");
            $conx-> RealizarConsulta();
            $conx->setQuery("insert into incidentedeinformacionosi (codigoForm,seguimientoOsi,evaluacionOsiAlta,evaluacionOsiMedia,evaluacionOsiBaja,perdidaDeservicio,perdidaDeEquipoOInstalaciones,sobrecargoMalFuncionamientoDelSistema,erroresHumanos,InclumplimientoPoliticasProcedimientos,deficienciasDeControlDeSeguridadFisica,cambiosIncontrolablesEnElSistema,malFuncionamientoDelHardware,malFuncionamientoHardware,codigoMalicioso,negacionDeServicios,ErroresIncompletosOnoActualizados,violacionesAlaConfidencialidadIntegridad,malUsoDeLosSistemasDeInformacion,accesosNoAutorizados,intentosRecurrentesNoRecurrentes,ataquesInternosExternos,modificacionNoAutorizada,divulgacionDeInfomracion,inpactoIncidente,activosAfectados,accionesAtomarAFuturo,responsable1,responsable2,responsable3,responsable4) values ('$codigoIncidente','$seguimientoOsi','$evaluacionOsiAlta','$evaluacionOsiMedia','$evaluacionOsiBaja','$perdidaDeservicio','$perdidaDeEquipoOInstalaciones','$sobrecargoMalFuncionamientoDelSistema','$erroresHumanos','$inclumplimientoPoliticasProcedimientos','$deficienciasDeControlDeSeguridadFisica','$cambiosIncontrolablesEnElSistema','$malFuncionamientoDelHardware','$malFuncionamientoHardware','$codigoMalicioso','$negacionDeServicios','$erroresIncompletosOnoActualizados','$violacionesAlaConfidencialidadIntegridad','$malUsoDeLosSistemasDeInformacion','$accesosNoAutorizados','$intentosRecurrentesNoRecurrentes','$ataquesInternosExternos','$modificacionNoAutorizada','$divulgacionDeInfomracion','$inpactoIncidente','$activosAfectados','$accionesAtomarAFuturo','$responsable1','$responsable2','$responsable3','$responsable4');");
            $conx-> RealizarConsulta();
            $mensaje = true;
        } catch (\Throwable $th) {
            $mensaje = $th;
        }
    }else{
        $mensaje="Hubo un error en la session o en el control del formulario";
    }

    echo $mensaje;
    //print_r($_POST); 
?>