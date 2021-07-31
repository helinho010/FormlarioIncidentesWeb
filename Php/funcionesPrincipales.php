<?php
    session_start();

    function cerrarSession()
    {
        session_unset();
        session_destroy();
        header('Location: http://formulario.com.bo:2402/');
        exit;
    }
    

?>