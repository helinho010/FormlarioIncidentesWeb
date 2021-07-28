<?php
    /*require_once '../../sistemasdetickets/Php/BDConexion.php';
    include_once 'datosIniciales';
    session_start();
    
    $_SESSION['soluUsuario']="";
    $_SESSION['soluNombre']="";
    $_SESSION['soluApPat']="";
    $_SESSION['soluApMat']="";
    $_SESSION['soluCi']="";
    $_SESSION['soluCargo']="";*/
    session_start();
    session_unset();
    session_destroy();
    header('Location: http://formulario.com.bo:2402/');
    exit;
?>