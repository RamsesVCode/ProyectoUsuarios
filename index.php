<?php if(!isset($_SESSION)) session_start();?>
<?php require_once 'includes/helpers.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <title>Demiko Pages</title>
</head>
<body>
    <div class="main">
        <div class="container">
            <header class="header">
                <a href="index.php" class="logo-home">Demiko</a>
                <div class="buttons">
                    <span class="header-option" id="inicio">Iniciar</span>
                    <span class="header-option" id="registro">Registrarse</span>
                </div>
            </header>
            <?php if(isset($_SESSION['errores'])):?>
                <div class="alerta error"><span>Error al registrarse, intente nuevamente</span></div>
            <?php endif;?>
            <?php if(isset($_SESSION['guarda'])):?> 
                <div class="alerta exito">
                    <span><?=$_SESSION['guarda'];?></span>    
                </div>     
            <?php endif;?>
            <div class="section">
                <h1>Demiko Pages cambiará tu mundo</h1>
                <p>Unete a nosotros</p>
            </div>
        </div>
        <div class="overlay" id="overlay">
        </div>
        <div class="modal" id="modal">
            <form action="record.php" method="POST">
                <div class="form-head">
                    <h3>Registrarte</h3>
                    <p>Es rapido y fácil</p>  
                    <i id="exit"></i>
                    <?php if(isset($_SESSION['errores'])):?> 
                        <div class="alerta error">
                            <?php if(isset($_SESSION['errores']['registro'])):?> 
                                <span><?=$_SESSION['errores']['registro'];?></span>        
                            <?php else:?>
                                <span>Revisa tu datos</span>    
                            <?php endif;?>
                        </div>     
                    <?php endif;?>
                </div>
                <div class="data">
                    <input type="text" name="nombre" placeholder="Nombre" <?php if(isset($_SESSION['errores']['nombre'])) echo 'value="'.$_SESSION['errores']['nombre'].'"';?> autocomplete="off" required id="nombre">
                    <?php echo isset($_SESSION['errores']['nombre']) ? mostrarError('Nombre no valido') : '';?>
                    <input type="text" name="apellidos" placeholder="Apellidos" <?php if(isset($_SESSION['errores']['apellidos'])) echo 'value="'.$_SESSION['errores']['apellidos'].'"';?> autocomplete="off" required id="apellidos"><br/>
                    <?php echo isset($_SESSION['errores']['apellidos']) ? mostrarError('Apellidos no validos') : '';?>
                    <input type="email" name="correo" placeholder="Correo electrónico" <?php if(isset($_SESSION['errores']['email'])) echo 'value="'.$_SESSION['errores']['email'].'"';?> autocomplete="off" required id="email"><br/>
                    <?php echo isset($_SESSION['errores']['email']) ? mostrarError('Email no valido') : '';?>
                    <input type="password" name="password" placeholder="Contraseña nueva" <?php if(isset($_SESSION['errores']['password'])) echo 'value="'.$_SESSION['errores']['password'].'"';?> required id="password">
                    <?php echo isset($_SESSION['errores']['password']) ? mostrarError('Password no valido') : '';?>
                    <p class="fecha">Fecha de nacimiento
                        <?php if(isset($_SESSION['errores']['fecha'])):?> 
                            <span style='color:red;'>(<?=$_SESSION['errores']['fecha'];?>)</span>    
                        <?php endif;?>
                    </p>
                    <div class="fecha-options">
                        <select name="dia" class="option">
                            <?php for($i=1;$i<=31;$i++):?>
                                <option value="<?=$i?>" <?php if($i==date('d')) echo 'selected';?>>
                                    <?=$i?>
                                </option>
                            <?php endfor;?>
                        </select>
                        <?php $mes = array('Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic');?>
                        <select name="mes" class="option">
                            <?php for($i=0;$i<count($mes);$i++):?>
                                <option value="<?=$i+1?>" <?php if($i+1==date('m')) echo 'selected';?>>
                                    <?=$mes[$i];?>
                                </option>
                            <?php endfor;?>
                        </select>
                        <select name="aio" class="option">
                            <?php for($i=date('Y');$i>=1905;$i--):?>
                                <option value="<?=$i?>" <?php if($i==date('Y')) echo 'selected';?>>
                                    <?=$i;?>
                                </option>
                            <?php endfor;?>
                        </select>
                    </div>
                    <p class="sexo">Sexo
                    <?php if(isset($_SESSION['errores']['sexo'])):?> 
                        <span style='color:red;'>(<?=$_SESSION['errores']['sexo'];?>)</span>    
                    <?php endif;?>
                    </p>
                    <div class="generos">
                        <div class="genero">
                            <label for="mujer">Mujer</label> 
                            <input type="radio" name="sexo" id="mujer" value="M">
                        </div>
                        <div class="genero">
                            <label for="hombre">Hombre</label>
                            <input type="radio" name="sexo" id="hombre" value="H">
                        </div>
                    </div>
                    <div class="submit">
                        <input type="Submit" value="Registrarte">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal login" id="modal-login">
            <form action="">
                <div class="form-head">
                    <h3>Iniciar Sesión</h3>
                    <i id="exit-login"></i>          
                </div>
                <div class="data">
                    <input type="email" name="correo" placeholder="Correo electrónico" autocomplete="off"><br/>
                    <input type="password" name="password" placeholder="Contraseña">
                    <div class="submit login">
                        <input type="submit" value="Iniciar Sesión"><br/>
                        <a href="">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </form>
        </div>
        <?php borrarErrores();?>
    </div>
    <script src="assets/js/app.js"></script>
</body>
</html>