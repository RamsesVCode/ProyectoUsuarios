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
                <?php $destinos = getDestinos($db, $_GET['id'],null);?>
                <?php $continente= getContinentes($db, $_GET['id']);?>
                <?php $costos= getCostos($db);?>
                <h1 class="section-title">Destinos disponibles en 
                    <?php $cont = mysqli_fetch_assoc($continente);?>
                    <?=$cont['NOMBRE'];?>
                </h1>
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
                <?php endif;?>
            </div>
        </section>
    </div>
</body>
</html>