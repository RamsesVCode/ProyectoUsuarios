<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <title>Demiko Pages</title>
</head>
<body>
    <div class="main">
        <div class="container">
            <header class="header">
                <a href="#" class="logo-home">Demiko</a>
                <div class="buttons">
                    <span class="header-option" id="inicio">Iniciar</span>
                    <span class="header-option" id="registro">Registrarse</span>
                </div>
            </header>
            <div class="section">
                <h1>Demiko Pages cambiará tu mundo</h1>
                <p>Unete a nosotros</p>
            </div>
        </div>
        <div class="overlay" id="overlay">
        </div>
        <div class="modal" id="modal">
            <form action="">
                <div class="form-head">
                    <h3>Registrarte</h3>
                    <p>Es rapido y fácil</p>  
                    <i id="exit"></i>          
                </div>
                <div class="data">
                    <input type="text" name="nombre" placeholder="Nombre" autocomplete="off">
                    <input type="text" name="apellidos" placeholder="Apellidos" autocomplete="off"><br/>
                    <input type="email" name="correo" placeholder="Numero de telefono o Correo electrónico" autocomplete="off"><br/>
                    <input type="password" name="password" placeholder="Contraseña nueva">
                    <p class="fecha">Fecha de nacimiento</p>
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
                                <option value="<?=$mes[$i]?>" <?php if($i+1==date('m')) echo 'selected';?>>
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
                    <p class="sexo">Sexo</p>
                    <div class="generos">
                        <div class="genero">
                            <label for="mujer">Mujer</label> 
                            <input type="radio" name="sexo" id="mujer" values="M">
                        </div>
                        <div class="genero">
                            <label for="hombre">Hombre</label>
                            <input type="radio" name="sexo" id="hombre" values="H">
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
                    <input type="email" name="correo" placeholder="Numero de telefono o Correo electrónico" autocomplete="off"><br/>
                    <input type="password" name="password" placeholder="Contraseña">
                    <div class="submit login">
                        <input type="submit" value="Iniciar Sesión"><br/>
                        <a href="">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/app.js"></script>
</body>
</html>