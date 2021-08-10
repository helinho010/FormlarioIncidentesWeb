<?php
    session_start();

    function mostrarBtnPorFuncionario()
    {
        $btnMostrado = " ";
        if (trim(strtolower($_SESSION['soluCargo'])) != "osi" && trim(strtolower($_SESSION['soluCargo'])) != "ti") 
        {
           $btnMostrado = '<input type="checkradius" class="btn-check" id="btncheck1" autocomplete="off">
           <label class="btn btn-outline-primary" for="btncheck1">Llenar Formulario</label>';
        }else{
            $btnMostrado = '<!--input type="checkradius" class="btn-check" id="btncheck1" autocomplete="off"-->
            <label class="btn btn-outline-primary" for="btncheck1">Llenar Formulario</label>'; 
        }
        
        return $btnMostrado;
    }
?>

<div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
    <!--input type="checkradius" class="btn-check" id="btncheck1" autocomplete="off">
    <label class="btn btn-outline-primary" for="btncheck1">Llenar Formulario</label-->
    <?php
      echo mostrarBtnPorFuncionario();
    ?>

    <input type="checkradius" class="btn-check" id="modDatosFunc" autocomplete="off">
    <label class="btn btn-outline-primary" for="modDatosFunc">Modificar datos Personales</label>

    <input type="checkradius" class="btn-check" id="cerrarSession" autocomplete="off">
    <label class="btn btn-outline-primary" for="cerrarSession">Cerrar Session</label>
</div>