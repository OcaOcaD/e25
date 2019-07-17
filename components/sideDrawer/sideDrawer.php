<?php 
    if ( $pestaña == "index" ){
        $start__link = "handleSideLink('#carousel')";
        $us__link = "handleSideLink('#us')";
        $services__link = "handleSideLink('#services')";
        $contact__link = "handleSideLink('#contact')";
    }else{
        $start__link = "window.location = 'index.php#carousel'";
        $us__link = "window.location = 'index.php#us'";
        $services__link = "window.location = 'index.php#services'";
        $contact__link = "window.location = 'index.php#contact'";
    }
?>

<nav id="sideDrawer" class="side-drawer">
    <ul>
        <li><a href="#" onclick="<?php echo $start__link ?>">ESTANCIA 25</a></li>
        <li><a href="#" onclick="<?php echo $us__link ?>">NOSOTROS</a></li>
        <li><a href="#" onclick="<?php echo $services__link ?>">SERVICIOS</a></li>
        <li><a href="#" onclick="<?php echo $contact__link ?>">CONTACTO</a></li>
    </ul>
</nav>