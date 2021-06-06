<?php
    if(isset($_POST)){
        if(!isset($_SESSION))
            session_start();
        require_once 'includes/conexion.php';
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
        $correo = isset($_POST['correo']) ? mysqli_real_escape_string($db,$_POST['correo']) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
        $dia = (int)$_POST['dia'];
        $mes = (int)$_POST['mes'];
        $aio = (int)$_POST['aio'];
        $sexo = isset($_POST['sexo']) ? $_POST['sexo']: false;
        $errores = array();
        //VALIDAMOS LOS DATOS
        //VALIDAMOS EL NOMBRE
        if(empty($nombre) || is_numeric($nombre) || preg_match('/[0-9]/',$nombre)){
            $errores['nombre'] = $nombre;
        }
        //VALIDAMOS LOS APELLIDOS
        if(empty($apellidos) || is_numeric($apellidos) || preg_match('/[0-9]/',$apellidos)){
            $errores['apellidos'] = $apellidos;
        }
        //VALIDAMOS EL CORREO O TELEFONO
        if(empty($correo) || !filter_var($correo,FILTER_VALIDATE_EMAIL)){
            $errores['email'] = $correo;
        }
        //VALIDAMOS LA CONTRASEÑA
        if(empty($password)){
            $errores['password']=$password;
        }
        //VALIDAMOS LA FECHA
        if($aio>=date('Y')-10 || !checkdate($mes,$dia,$aio)){
            $errores['fecha']='Verifique la fecha';
        }else{
            // $fecha = $aio.'-'.sprintf('%2d',$mes).'-'.$dia;
            $fecha = $aio.'-'.$mes.'-'.$dia;
        }
        //VALIDAMOS EL SEXO
        if(empty($sexo)){
            $errores['sexo']='Seleccione un genero';
        }
        //VERIFICAMOS QUE NO HAYAN ERRORES
        if(count($errores)==0){
            //CODIFICAMOS LA CONTRASEÑA
            $password_segura = password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
            $sql = "INSERT INTO usuarios VALUES(null,'$nombre','$apellidos','$correo','$password_segura','$fecha','$sexo',CURDATE());";
            $guarda = mysqli_query($db,$sql);
            if($guarda){
                $_SESSION['guarda']='Registro exitoso';
            }else{
                $errores['registro']='No se pudo registrar los datos';
                $_SESSION['errores']=$errores;
                header('Location:index.php');
            }
        }else{
            $_SESSION['errores']=$errores;
            // var_dump($errores);die();
        }
        header('Location:index.php');
    }

?>