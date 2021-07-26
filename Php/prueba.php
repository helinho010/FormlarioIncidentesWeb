<?php

require_once '../../sistemasdetickets/Php/BDConexion.php';

  $p = new Conexionbd();  
  $p-> setUsuario('helio');
  $p-> setContrasenia('H3l10');
  $p->setQuery("select count(*) from atendido where horaatendida > '26-07-2021 16:00'");
  $p-> RealizarConsulta();

  $rep = $p->getConsulta();

  while ($row=pg_fetch_row($rep)) 
  {
    echo print_r($row);
  }

  echo time();
?>