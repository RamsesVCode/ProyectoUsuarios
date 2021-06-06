<?php
    function borrarErrores(){
        if(isset($_SESSION['errores'])){
            unset($_SESSION['errores']);
        }
        if(isset($_SESSION['guarda'])){
            unset($_SESSION['guarda']);
        }
    }
    function mostrarError($error){
        $errorString = "<span id='$error'></span>";
        return $errorString;
    }


?>