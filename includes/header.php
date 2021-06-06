<?php require_once 'includes/verify-sesion.php';?>
<?php require_once 'includes/helpers.php';?>
<?php require_once 'includes/conexion.php';?>
<?php if(!isset($_SESSION)) session_start();?>
<header class="header">
    <div class="header-logo">
        <a href="index.php" class="logo-home">DEMIKO</a>
        <form action="#">
            <input type="text" name="busqueda" placeholder="Buscar" autocomplete="off">
            <button type="image"><i></i></button>
        </form>
    </div>
    <div class="usuario">
        <a href="#">
            <span><?=$_SESSION['usuario']['NOMBRE'];?></span>
            <img src="<?php echo $_SESSION['usuario']['FOTO'];?>" alt="user"/>
        </a>
        <i></i>
    </div>
</header>