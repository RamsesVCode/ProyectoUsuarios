<aside class="aside">
    <h2 class="aside-title">CONTINENTES</h2>
    <ul>
        <?php $continentes = getContinentes($db);?>
        <?php if($continentes!=''):?>
            <?php while($continente = mysqli_fetch_assoc($continentes)):?>
                <li><span class="continente"><?=$continente['NOMBRE'];?></span><span class="item-list"><i></i></span></li>
            <?php endwhile;?>    
        <?php endif;?>
    </ul>
</aside>