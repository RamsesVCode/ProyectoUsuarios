<?php 
    if(isset($_SESSION['usuario']) && isset($_GET['id'])){
        if(!isset($_SESSION))
            session_start();
        require_once 'includes/conexion.php';
        $id_destino = $_GET['id'];
        $sql = "UPDATE reservas SET ESTADO = 0 WHERE PASAJE_ID=$id_destino";
        $query = mysqli_query($db,$sql);
        if($query){
            $_SESSION['guarda'] = 'Se eliminó la reserva';
        }else{
            $_SESSION['guarda'] = 'No se pudo eliminar la reserva';
        }
        $sql = "UPDATE destinos SET CUPOS = CUPOS+1 WHERE ID=$id_destino";
        $query = mysqli_query($db,$sql);
        if($query){
            $_SESSION['guarda'] = 'Se eliminó la reserva';
        }else{
            $_SESSION['guarda'] = 'No se pudo eliminar la reserva';
        }
        header("Location:destino.php?id=$id_destino");
    }else{
        header("Location:index.php");
    }
?>