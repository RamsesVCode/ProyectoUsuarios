<?php
    if(isset($_POST)){
        if(!isset($_SESSION))
            session_start();
        require_once 'includes/conexion.php';
        $clase = isset($_POST['clase']) ? (int)$_POST['clase'] : false;
        $cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : false;
        if(isset($_GET['id'])){
            $id_destino = (int)$_GET['id'];
        }
        $id_usuario = $_SESSION['usuario']['ID'];
        $sql = "INSERT INTO reservas VALUES(null,$id_usuario,$id_destino,$cantidad,'1',CURDATE())";
        $query = mysqli_query($db,$sql);
        if($query){
            $_SESSION['guarda'] = 'Reserva exitosa';
        }else{
            $_SESSION['guarda'] = 'Error en la reserva';
        }
        $sql = "UPDATE destinos SET CUPOS=CUPOS-$cantidad WHERE ID=$id_destino";
        $query = mysqli_query($db,$sql);
        if($query){
            $_SESSION['guarda'] = 'Reserva exitosa';
        }else{
            $_SESSION['guarda'] = 'Error en la reserva';
        }
        header("Location:destino.php?id=$id_destino");
    }


?>