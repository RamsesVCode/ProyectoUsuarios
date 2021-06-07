<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/home-styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Demiko Home</title>
</head>
<body>
    <div class="main">
        <?php require_once 'includes/header.php';?>
        <?php require_once 'includes/aside.php';?>
        <section class="section">
            <div class="section-container">
                <?php if(isset($_GET['id'])):?>
                <?php $destinos = getDestinos($db, null, $_GET['id']);?>
                <?php $costos = getCostos($db);?>
                <?php if($destinos!=''):?>
                <?php $destino = mysqli_fetch_assoc($destinos);?>
                <h1 class="section-title">Destino: <?=$destino['NOMBRE'];?></h1>
                <article class="article">
                    <div class="item-destino">
                        <a href="#" class="title-destino"><?=$destino['NOMBRE'];?></a>
                        <div class="images-container">
                            <figure>
                                <img src="assets/images/viaje1.jpg" alt="image-destino">
                            </figure>
                            <figure>
                                <img src="assets/images/viaje1-2.jpg" alt="image-destino">
                            </figure>
                            <figure>
                                <img src="assets/images/viaje1-1.jpg" alt="image-destino">
                            </figure>
                        </div>
                        <p><?php echo substr($destino['DESCRIPCION'],0,200).'...';?></p>
                        <?php if(isset($_SESSION['usuario'])):?>
                        <div class="options">
                            <h3>Opciones disponibles</h3>
                            <?php if(isset($_SESSION['guarda'])):?>
                                <span class="exito"><?=$_SESSION['guarda']?></span><br/>
                            <?php endif;?>
                            <span class="cupos">Cupos disponibles: <?=$destino['CUPOS'];?></span>
                            <?php if($costos!=''): ?>
                                <form action="reserva.php?id=<?=$_GET['id'];?>" method="POST">
                                <span class="clase">
                                    Seleccione una clase 
                                    <select name="clase">
                                        <?php while($costo = mysqli_fetch_assoc($costos)):?>
                                            <option value="<?=$costo['ID'];?>"><?=$costo['NOMBRE'];?></option>
                                            <?php endwhile;?>
                                        </select>
                                    </span><br/>
                                <span class="costo">El costo por voleto es: <?=$destino['COSTO']?> $</span><br/>
                                <?php endif;?>
                                <span class="cantidad">Cantidad:</span>
                                <select name="cantidad">
                                    <?php for($i=1;$i<=6;$i++):?>
                                        <option value="<?=$i?>"><?=$i?></option>
                                    <?php endfor;?>
                                </select>
                                <br/>
                                <input type="submit"class="item reserva" value="Reservar">
                                <a style="text-decoration:none;" href="delete-reserva.php?id=<?=$_GET['id'];?>" class="item borrar">Eliminar una reserva</a>
                            </form>
                            <?php borrarErrores();?>
                        </div>
                        <?php endif;?>
                    </div>
                </article>
                <?php endif;?>
                <?php endif;?>
            </div>
        </section>
    </div>
</body>
</html>