<?php
    function borrarErrores(){
        if(isset($_SESSION['errores'])){
            unset($_SESSION['errores']);
        }
        if(isset($_SESSION['guarda'])){
            unset($_SESSION['guarda']);
        }
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
        }
    }
    function mostrarError($error){
        $errorString = "<span id='$error'></span>";
        return $errorString;
    }


?>