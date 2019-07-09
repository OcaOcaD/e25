<div id="contact" class="contact">
    <div class="contact__background"></div>
    <div class="contact__container">
        <div class="contact__title">
            <h1>Estamos para servirte</h1>
        </div>
        <div class="contact__info">
            <form class="contact__form" action="components/contact/save_contact.php">
                <div class="contact__form__top">
                    <div class="form__group" >
                        <label for="contact__name" class="form__label" >NOMBRE</label>
                        <input type="text" id="contact__name" name="contact__name" class="contact__name" >                    
                    </div>    
                    <div class="form__group">
                        <label for="contact__phone" class="form__label" >TELÉFONO</label>
                        <input type="text" id="contact__phone" name="contact__phone" class="contact__phone" >
                    </div>
                    <div class="form__group">
                        <label for="contact__email" class="form__label" >EMAIL</label>    
                        <input type="text" id="contact__email" name="contact__email" class="contact__email" >
                    </div>
                </div>
                <div class="form__group">
                    <label for="contact_msg" class="form__label" >MENSAJE</label>
                    <textarea name="contact__msg" id="contact__msg" class="contact__msg" cols="20" rows="5"></textarea>
                </div>
                <div class="form__group">
                    <button class="contact__button">ENVIAR MENSAJE</button>
                </div>
            </form>
        </div>
    </div>
</div>