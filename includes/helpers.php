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
    function getContinentes($db){
        $sql = "SELECT * FROM CONTINENTE";
        $query = mysqli_query($db,$sql);
        if(mysqli_num_rows($query)>0){
            return $query;
        }
        else{
            return '';
        }
    }
    function getDestinos($db, $id=null){
        $sql = "SELECT * FROM DESTINOS";
        if($id!=null){
            $sql .= " WHERE CONTINENTE_ID = $id";
        }
        $query = mysqli_query($db,$sql);
        if($query && mysqli_num_rows($query)>0){
            return $query;
        }else{
            return '';
        }
    }
?>