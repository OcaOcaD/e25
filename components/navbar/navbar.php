<?php 
    if ( $pestaña == "index" ){
        $start__link = "goToByScroll('#carousel')";
        $us__link = "goToByScroll('#us')";
        $services__link = "goToByScroll('#services')";
        $contact__link = "goToByScroll('#contact')";
    }else{
        $start__link = "window.location = 'index.php#carousel'";
        $us__link = "window.location = 'index.php#us'";
        $services__link = "window.location = 'index.php#services'";
        $contact__link = "window.location = 'index.php#contact'";
    }
?>
<div class="navbar__container">
    <div id="shadow" class="shadow"></div>
    <div class="drawertogglebutton__container">
        <button class="toggle-button" onclick="drawerToggleClickHandler()" style="cursor: pointer">
            <div class="toggle-button__line"></div>
            <div class="toggle-button__line"></div>
            <div class="toggle-button__line"></div>
        </button>
    </div>
    <nav class="navbar">
        <div class="navbar__logo">
            <img class="navbar__logo__img" src="img/basic/logotipo_blanco.png" alt="" class="navbar__container">
        </div>
        <ul class="navbar__options">
            <li onclick="<?php echo $start__link?>" class="navbar__item">ESTANCIA 25</li>
            <li onclick="<?php echo $us__link?>" class="navbar__item">NOSOTROS</li>
            <li onclick="<?php echo $services__link?>" class="navbar__item">SERVICIOS</li>
            <li onclick="<?php echo $contact__link?>" class="navbar__item">CONTACTO</li>
        </ul>
    </nav>

</div>
    