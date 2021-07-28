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
          $p->setQuery("select getidfuncionario('$usuarioajax', '$contraseniaajax')");
          $p-> RealizarConsulta();
          $respConsulta2= $p->getConsulta();
          $row2= pg_fetch_row($respConsulta2);
          $p->setQuery("select datosFuncionario($row2[0])");
          $p-> RealizarConsulta();
          $respConsulta3=$p->getConsulta();
          $row3=pg_fetch_row($respConsulta3);
          $_SESSION['soluUsuario']=$usuarioajax;
          $row3[0]= str_replace('"',"",$row3[0]);
          $row3[0]= str_replace('(',"",$row3[0]);
          $row3[0]= str_replace(')',"",$row3[0]);
          $_SESSION['soluNombre']=substr($row3[0], 0 , strpos($row3[0], ','));
          $row3[0]=substr( "$row3[0]", strpos("$row3[0]",",")+1, strlen("$row3[0]") );
          $_SESSION['soluApPat']=substr($row3[0], 0, strpos($row3[0],","));
          $row3[0]=substr( $row3[0], strpos($row3[0],",")+1, strlen($row3[0]) );
          $_SESSION['soluApMat']=substr($row3[0], 0, strpos($row3[0],","));
          $row3[0]=substr( $row3[0], strpos($row3[0],",")+1, strlen($row3[0]) );
          $_SESSION['soluCi']=substr($row3[0], 0, strpos($row3[0],","));
          $row3[0]=substr( $row3[0], strpos($row3[0],",")+1, strlen($row3[0]) );
          $_SESSION['soluCargo']=$row3[0];
          //echo ($_SESSION['soluNombre'] ."\n". $_SESSION['soluApPat'] ."\n".$_SESSION['soluApMat'] ."\n".$_SESSION['soluCi'] ."\n".$_SESSION['soluCargo'] ."\n". "fin");
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