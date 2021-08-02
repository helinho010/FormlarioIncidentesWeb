<?php
require_once '../../sistemasdetickets/Php/BDConexion.php';
include_once 'datosIniciales.php';
session_start();
  $usuarioajax=$_POST['usuario'];
  $contraseniaajax=$_POST['contrasenia'];
  $dato=$_POST['dato'];

  function datosSession ($data)
  {
      try {
        $_SESSION['soluNombre']=substr($data, 0 , strpos($data, ','));
        $data=substr( "$data", strpos("$data",",")+1, strlen("$data") );
        $_SESSION['soluApPat']=substr($data, 0, strpos($data,","));
        $data=substr( $data, strpos($data,",")+1, strlen($data) );
        $_SESSION['soluApMat']=substr($data, 0, strpos($data,","));
        $data=substr( $data, strpos($data,",")+1, strlen($data) );
        $_SESSION['soluCi']=substr($data, 0, strpos($data,","));
        $data=substr( $data, strpos($data,",")+1, strlen($data) );
        $_SESSION['soluCargo']=substr($data, 0, strpos($data,","));
        $data=substr( $data, strpos($data,",")+1, strlen($data) );
        $_SESSION['soluidFuncionario']=$data;
        return 0;
      } catch (\Throwable $th) {
        return 1;
      }
  }
  if (!empty($usuarioajax) && !empty($contraseniaajax)) {
    try {
      $p = new Conexionbd();  
      $p-> setUsuario($usuariobd);
      $p-> setContrasenia($contraseniabd);
      $p->setQuery("select credencialesuser('$usuarioajax','$contraseniaajax')");
      $p-> RealizarConsulta();
      $repConsulta1 = $p->getConsulta();
      $row=pg_fetch_row($repConsulta1);
      if ($row[0]=='t' || $row[0] =='true' || $row[0] == 1) {
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
          datosSession($row3[0]);
          /*$_SESSION['soluNombre']=substr($row3[0], 0 , strpos($row3[0], ','));
          $row3[0]=substr( "$row3[0]", strpos("$row3[0]",",")+1, strlen("$row3[0]") );
          $_SESSION['soluApPat']=substr($row3[0], 0, strpos($row3[0],","));
          $row3[0]=substr( $row3[0], strpos($row3[0],",")+1, strlen($row3[0]) );
          $_SESSION['soluApMat']=substr($row3[0], 0, strpos($row3[0],","));
          $row3[0]=substr( $row3[0], strpos($row3[0],",")+1, strlen($row3[0]) );
          $_SESSION['soluCi']=substr($row3[0], 0, strpos($row3[0],","));
          $row3[0]=substr( $row3[0], strpos($row3[0],",")+1, strlen($row3[0]) );
          $_SESSION['soluCargo']=substr($row3[0], 0, strpos($row3[0],","));
          $row3[0]=substr( $row3[0], strpos($row3[0],",")+1, strlen($row3[0]) );
          $_SESSION['soluidFuncionario']=$row3[0];*/
          //echo ($_SESSION['soluNombre'] ."\n". $_SESSION['soluApPat'] ."\n".$_SESSION['soluApMat'] ."\n".$_SESSION['soluCi'] ."\n".$_SESSION['soluCargo'] ."\n". "fin");
      }
      echo ($row[0]);
    } catch (\Throwable $th) {
      echo ('f');    
    }
  }elseif (!empty($dato) && count($_SESSION)>0) { 
       $nombre = $_POST['nombre'];
       $ap_pat = $_POST['ap_pat'];
       $ap_mat = $_POST['ap_mat'];
       $ci =  $_POST['ci'];
       $cargo =  $_POST['cargo'];
       $conxcion_bd = new Conexionbd();
       $conxcion_bd-> setUsuario($usuariobd);
       $conxcion_bd-> setContrasenia($contraseniabd);
       $conxcion_bd->setQuery("update funcionario set nombre = '$nombre', ap_pat = '$ap_pat', ap_mat='$ap_mat', doc_identidad = '$ci', cargo = '$cargo' where id_funcionario = " .$_SESSION['soluidFuncionario']);
       $conxcion_bd->RealizarConsulta();
       $conxcion_bd->setQuery("select datosfuncionario(".$_SESSION['soluidFuncionario'].")");
       $conxcion_bd->RealizarConsulta();
       $respConsulta=$conxcion_bd->getConsulta();
       $row=pg_fetch_row($respConsulta);
       $row[0]= str_replace('"',"",$row[0]);
       $row[0]= str_replace('(',"",$row[0]);
       $row[0]= str_replace(')',"",$row[0]);
        if (datosSession($row[0]) == 0) 
        {
          echo "Datos almacenados correctamente";
        }else {
          echo "Hubo error al modificar los datos de session";
        }
      
  }else{
    echo "f";
  }
  
?>