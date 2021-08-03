<?php
    require_once '../../sistemasdetickets/Php/BDConexion.php';
    include_once 'datosIniciales.php';
    session_start();
    if(count($_SESSION)>0)
    {
        $codigo=$_POST[''];
        $fecha=$_POST['fecha'];
        $hora=$_POST['hora'];
        $oficina=$_POST['oficina'];
        $reportadoPor=$_POST['reportadoPor'];
        $cargo=$_POST['cargo'];
        $datelleIncidente=$_POST['detalle'];    
        

    }
    
    $OrigenIncidenteInterno=$_POST[''];
    $OrigenIncidenteExterno=$_POST[''];
    $PrioridadAlto=$_POST[''];
    $PrioridadMedio=$_POST[''];
    $PrioridadBajo=$_POST[''];
    $revisionInicialTi=$_POST[''];
    $seguimientoTi=$_POST[''];
    $solucionTi=$_POST[''];
    $seguimientoOsi=$_POST[''];
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
    $responsable4=$_POST[''];
    
    print_r($_POST); 
?>