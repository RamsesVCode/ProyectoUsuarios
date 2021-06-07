<?php require_once 'includes/helpers.php';?>
<?php require_once 'includes/conexion.php';?>
<?php if(!isset($_SESSION)) session_start();?>
<header class="header">
    <div class="header-logo">
        <a href="index.php" class="logo-home">DEMIKO</a>
        <!-- <form action="busqueda.php"> -->
            <input oninput="buscar(this);" type="text" name="buscar" placeholder="Buscar" autocomplete="off">
            <span><i></i></span>
        <!-- </form> -->
    </div>
    <div class="usuario">
        <?php if(isset($_SESSION['usuario'])): ?>
        <a href="#">
            <span><?=$_SESSION['usuario']['NOMBRE'];?></span>
            <img src="<?php echo $_SESSION['usuario']['FOTO'];?>" alt="user"/>
        </a>
        <i></i>
        <?php else:?>
            <a href="index.php">
                <span>Volver al inicio</span>
            </a>
        <?php endif;?>
    </div>
</header>