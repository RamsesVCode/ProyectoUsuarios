<?php
    if(isset($_POST)){
        if(!isset($_SESSION))
            session_start();
        require_once 'includes/conexion.php';
        $correo = isset($_POST['correo']) ? mysqli_real_escape_string($db,$_POST['correo']) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
        $login = array();
        //VALIDAMOS EL CORREO
        if(empty($correo) || !filter_var($correo,FILTER_VALIDATE_EMAIL)){
            $login['email'] = 'El Correo no es valido';
        }
        if(empty($password)){
            $login['pass'] = 'El Password no es valido';
        }
        //VERIFICAMOS QUE NO HAYAN ERRORES
        if(count($login)==0){
            $sql = "SELECT * FROM USUARIOS WHERE CORREO = '$correo'";
            $query = mysqli_query($db,$sql);
            if(mysqli_num_rows($query)>0){
                $usuario = mysqli_fetch_assoc($query);
                if(password_verify($password,$usuario['PASS'])){
                    $_SESSION['usuario'] = $usuario;
                    header('Location:home.php');
                }else{
                    $login['valida'] = 'No se pudo validar el usuario';
                    $_SESSION['login'] = $login;
                    header('Location:index.php');
                }
            }else{
                $login['contenido'] = 'No se encontró el usuario';
                $_SESSION['login'] = $login;
                header('Location:index.php');
            }
        }else{
            $_SESSION['login'] = $login;
            header('Location:index.php');
        }
    }

?>