<?php require_once 'includes/helpers.php';?>
<?php require_once 'includes/conexion.php';?>
<h1 class="section-title">Ultimos destinos publicados</h1>
<?php $busqueda = $_GET['buscar'];?>
<?php $destinos = getDestinos($db,null,null,$busqueda);?>
<?php if($destinos!=''):?>
<?php while($destino = mysqli_fetch_assoc($destinos)): ?>
<article class="article">
    <div class="item-destino">
        <a href="destino.php?id=<?=$destino['ID'];?>" class="title-destino"><?=$destino['NOMBRE'];?></a>
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
    </div>
</article>
<?php endwhile;?>
<?php endif;?>