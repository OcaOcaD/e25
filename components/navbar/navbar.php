<div class="navbar__container">
    <div id="shadow" class="shadow"></div>
    <div class="drawertogglebutton__container">
        <button class="toggle-button" onClick={props.click}>
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
            <li onclick="goToByScroll(services)" class="navbar__item">ESTANCIA 25</li>
            <li onclick="goToByScroll(services)" class="navbar__item">NOSOTROS</li>
            <li onclick="goToByScroll(services)" class="navbar__item">SERVICIOS</li>
            <li onclick="goToByScroll(services)" class="navbar__item">CONTACTO</li>
        </ul>

    </nav>

</div>
    