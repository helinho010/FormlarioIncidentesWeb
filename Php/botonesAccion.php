<?php
    session_start();

    function mostrarBtnPorFuncionario()
    {
        $textoMostrado = " ";
        if (trim(strtolower($_SESSION['soluCargo'])) == 'cajero' || trim(strtolower($_SESSION['soluCargo'])) == 'plataforma') 
        {
           $textoMostrado = "Llenar Formulario";
        }elseif (trim(strtolower($_SESSION['soluCargo'])) == 'eti') {
            $textoMostrado = "Mostrar Formularios <span class='badge bg-danger'>4</span>"; 
        }elseif (trim(strtolower($_SESSION[soluCargo])) == 'osi') {
            $textoMostrado = "Llenar Formulario <span class='badge bg-danger'>4</span>"; 
        }
        return $textoMostrado;
    }
?>

<div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
    <input type="checkradius" class="btn-check" id="btncheck1" autocomplete="off">
    <label class="btn btn-outline-primary" for="btncheck1"><?php echo mostrarBtnPorFuncionario();?></label>

    <input type="checkradius" class="btn-check" id="modDatosFunc" autocomplete="off">
    <label class="btn btn-outline-primary" for="modDatosFunc">Modificar datos Personales</label>

    <input type="checkradius" class="btn-check" id="cerrarSession" autocomplete="off">
    <label class="btn btn-outline-primary" for="cerrarSession">Cerrar Session</label>
</div>