<?php 
    if(!isset($_SESSION))
        session_start();
    if(isset($_SESSION['usuario']) && isset($_GET['id'])){
        require_once 'includes/conexion.php';
        $id_destino = $_GET['id'];
        $sql = "UPDATE reservas SET ESTADO = 0 WHERE PASAJE_ID=$id_destino AND USUARIO_ID =".$_SESSION['usuario']['ID'];
        $query = mysqli_query($db,$sql);
        if($query){
            $_SESSION['guarda'] = 'Se eliminó la reserva';
        }else{
            $_SESSION['guarda'] = 'No se pudo eliminar la reserva';
        }
        $sql = "SELECT CUPOS FROM destinos WHERE ID=$id_destino";
        $query = mysqli_query($db, $sql);
        $disponible = mysqli_fetch_assoc($query);
        if($disponible['CUPOS']<200){
            $sql = "UPDATE destinos SET CUPOS = CUPOS+1 WHERE ID=$id_destino";
            $query = mysqli_query($db,$sql);
        }else{
            $_SESSION['guarda'] = 'No tiene reservas';
        }
        header("Location:destino.php?id=$id_destino");
    }else{
        header("Location:index.php");
    }
?>