<?php
require_once '../../sistemasdetickets/Php/BDConexion.php';
include_once 'datosIniciales.php';
  $usuarioajax=$_POST['usuario'];
  $contraseniaajax=$_POST['contrasenia'];
  if (!empty($usuarioajax) || !empty($contraseniaajax)) {
    try {
      $p = new Conexionbd();  
      $p-> setUsuario($usuariobd);
      $p-> setContrasenia($contraseniabd);
      $p->setQuery("select credencialesuser('$usuarioajax','$contraseniaajax')");
      $p-> RealizarConsulta();
      $repConsulta1 = $p->getConsulta();
      $row=pg_fetch_row($repConsulta1);
      if ($row[0]=='t' || $row[0] =='true' || $row[0] == 1) {
          session_start();
          /*$p->setQuery("select credencialesuser('$usuarioajax','$contraseniaajax')");
          $p-> RealizarConsulta();*/
          $_SESSION['soluUsuario']="flbernal@solucredit.com.bo";
          $_SESSION['soluNombre']="Fabrizzio ";
          $_SESSION['soluApPat']="Bernal";
          $_SESSION['soluApMat']="Gonzales";
          $_SESSION['soluCi']="6725038";
          $_SESSION['soluCargo']="Cajero";
      }
      echo ($row[0]);
    } catch (\Throwable $th) {
      echo ('f');    
    }
  }else
  {
    echo "f";
  }
  
?>