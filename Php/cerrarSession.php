<?php
    session_start();
    
    if (!empty($_POST['senial']) && $_POST['senial'] == 1) 
    {
        if (count($_SESSION)>0) {
            try {
                session_unset();
                session_destroy();
                echo "ok";
                //header("Location:http://formulario.com.bo:2402/");
                
            } catch (\Throwable $th) {
                echo "Error al cerrar session";
            }    
        }else {
            header("Location: http://formulario.com.bo:2402/");
        }   
    }else {
        
        if (count($_SESSION)>0) {
            try {
                session_unset();
                session_destroy();
                header("Location:http://formulario.com.bo:2402/");
                
            } catch (\Throwable $th) {
                echo "Error al cerrar session";
            }    
        }else {
            header("Location: http://formulario.com.bo:2402/");
        } 
    }
?>