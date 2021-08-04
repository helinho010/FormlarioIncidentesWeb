<?php
    require_once '../../sistemasdetickets/Php/BDConexion.php';
    include_once 'datosIniciales.php';
    session_start();

    function getIconoEditVer()
    {
        $nombreicono = "";

        if(strtolower($_SESSION['soluCargo']) != "osi" && strtolower($_SESSION['soluCargo']) != "ti")
        {
            $nombreicono = "outline_remove_red_eye_black_48dp.png";
        }else {
            $nombreicono = "outline_edit_black_48dp.png";
        }
        return $nombreicono;
    }

    if(count($_SESSION)>0)
    {
        if (strtolower($_SESSION['soluCargo']) != "osi" && strtolower($_SESSION['soluCargo']) != "ti")
        {
            $sql = "select codigo, fecha, oficina from incidentedeinformacionfuncionario where id_func = ".$_SESSION['soluidFuncionario']." order by 1 desc";
        }
        else {
            $sql = "select codigo, fecha, oficina from incidentedeinformacionfuncionario order by 1 desc";
        }
        
    try {
        $conx = new Conexionbd();  
        $conx-> setUsuario($usuariobd);
        $conx-> setContrasenia($contraseniabd);
        $conx->setQuery($sql);
        $conx-> RealizarConsulta();
        $repConsulta1 = $conx->getConsulta();
        $tablaResultado = pg_fetch_all($repConsulta1);
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Codigo Formulario</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Oficina</th>
    </tr>
  </thead>
  <tbody>

<?php
    $i=1;
    foreach ($tablaResultado as $key => $value) {
?>
    <tr>
        <th scope="row"><?php echo $i; $i++;?></th>

<?php
        foreach ($value as $key1 => $value1) {
 ?>
     
      <td><?php echo $value1; if(preg_match("/SOLUINC-/i",$value1, )) {$codigoFormulario = $value1;}?></td>
    
 <?php
        } ?>
        <!--td><?php echo "<a href='#' id='".$codigoFormulario."'><img src='../Imagenes/Iconos/2x/".getIconoEditVer()."' alt='editar' width='10px;'><a>";?></td-->
        <td><?php echo '<form action="Php/formularioIncidentes.php" method="POST">
    <input type="hidden" name="codForm" value="'.$codigoFormulario.'">
    <button type="submit"> <img src="Imagenes/Iconos/2x/'.getIconoEditVer().'" alt="editar" width="10px;"> </button>
</form>';?></td>  
 <?php     }    
    } catch (\Throwable $th) {
        $mensaje = $th;
    }
?>
    </tr>
  </tbody>
</table>
<?php
    } //end if
    else {
        header("Location:http://formulario.com.bo:2402/");
    }
?>
<form action="formularioIncidentes.php" methood="post">
    <input type="hidden" name="codForm" value="">
    <button type="submit"> </button>
</form>