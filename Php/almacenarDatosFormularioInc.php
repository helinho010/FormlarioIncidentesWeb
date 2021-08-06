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
    }elseif (count($_SESSION)>0 && $_POST['control'] == 2) {
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
            $conx->setQuery("insert into incidentedeinformacionti (codigoForm, OrigenIncidenteInterno,Origenincidenteexterno,PrioridadAlto,PrioridadMedio,PrioridadBajo,revisionInicialTi,seguimientoTi,solucionTi) values ('$codigoIncidente','$OrigenIncidenteInterno','$OrigenIncidenteExterno','$PrioridadAlto','$PrioridadMedio','$PrioridadBajo','$revisionInicialTi','$seguimientoTi','$solucionTi')");
            $conx-> RealizarConsulta();
            $mensaje = true;
        } catch (\Throwable $th) {
            $mensaje = $th;
        }
    }elseif (count($_SESSION)>0 && $_POST['control'] == 3) {
        /*$seguimientoOsi=$_POST[''];
        $evaluacionOsiAlta=$_POST[''];
        $evaluacionOsiMedia=$_POST[''];
        $evaluacionOsiBaja=$_POST[''];
        $perdidaDeservicio=$_POST[''];
        $perdidaDeEquipoOInstalaciones=$_POST[''];
        $sobrecargoMalFuncionamientoDelSistema=$_POST[''];
        $erroresHumanos=$_POST[''];
        $InclumplimientoPoliticasProcedimientos=$_POST[''];
        $deficienciasDeControlDeSeguridadFisica=$_POST[''];
        $cambiosIncontrolablesEnElSistema=$_POST[''];
        $malFuncionamientoDelHardware=$_POST[''];
        $malFuncionamientoHardware=$_POST[''];
        $codigoMalicioso=$_POST[''];
        $negacionDeServicios=$_POST[''];
        $ErroresIncompletosOnoActualizados=$_POST[''];
        $violacionesAlaConfidencialidadIntegridad=$_POST[''];
        $malUsoDeLosSistemasDeInformacion=$_POST[''];
        $accesosNoAutorizados=$_POST[''];
        $intentosRecurrentesNoRecurrentes=$_POST[''];
        $ataquesInternosExternos=$_POST[''];
        $modificacionNoAutorizada=$_POST[''];
        $divulgacionDeInfomracion=$_POST[''];
        $inpactoIncidente=$_POST[''];
        $activosAfectados=$_POST[''];
        $accionesAtomarAFuturo=$_POST[''];
        $responsable1=$_POST[''];
        $responsable2=$_POST[''];
        $responsable3=$_POST[''];
        $responsable4=$_POST[''];*/
        $mensaje = $_POST['control']."yes ya entro por aca"  ;
    }else{
        $mensaje="Hubo un error en el al pasar los datos";
    }

    echo $mensaje;
    //print_r($_POST); 
?>