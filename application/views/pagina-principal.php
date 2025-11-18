<!DOCTYPE html>
<html lang="es">

<head>
    <title><?= $titulo; ?></title>
    <meta charset="UTF-8">
    <meta autor="Borja Morón">
    <link rel="stylesheet" href="<?= base_url('assets/css/estilos.css') ?>">
</head>

<body>
    <header>
        <h1>Pagina Web</h1>
    </header>
    <nav>
        <ul>
            <li><a href="<?=base_url() ?>">Home</a></li>
            <li><a href="<?=site_url('pagina1')?>">pagina 1</a></li>
            <li><a href="<?=site_url('pagina2')?>">pagina 2</a></li>
            <li><a href="<?=site_url('pagina3')?>">pagina 3</a></li>
            <li><a href="<?=site_url('pagina4')?>">pagina 4</a></li>
            <div class="position-login"><li><a href="#login-modal" class="login">login</a></li></div>
            <div class="position-basket"><li><a href="#basket-modal" class="basket">basket</a></li></div>
        </ul>
    </nav>
    <section>
        <!--Slider de Novedades-->
        <h2>Novedades</h2>
        <div class="novedades">
            <div class="novedad">
                <img src="<?= base_url('assets/img/novedad1.jpg') ?>" alt="novedad1">
                <!--<h3>Novedad 1</h3>
                    <p>Descripcion de la novedad 1</p>-->
            </div>
            <div class="novedad">
                <img src="<?= base_url('assets/img/novedad2.jpg') ?>" alt="novedad2">
                <!--<h3>Novedad 2</h3>
                    <p>Descripcion de la novedad 2</p>-->
            </div>
            <div class="novedad">
                <img src="<?= base_url('assets/img/novedad3.jpg') ?>" alt="novedad3">
                <!--<h3>Novedad 3</h3>
                    <p>Descripcion de la novedad 3</p>-->
            </div>
            <div class="novedad">
                <img src="<?= base_url('assets/img/novedad4.jpg') ?>" alt="novedad4">
                <!--<h3>Novedad 4</h3>
                    <p>Descripcion de la novedad 4</p>-->
            </div>
        </div>
    </section>
    <section>
        <h2>Inicio</h2>
        <div class="enlaces">
            <div class="enlace1">
                <img src="<?= base_url('assets/img/novedad1.jpg') ?>" alt="novedad1">
                <h3>Novedad 1</h3>
            </div>
            <div class="enlace2">
                <img src="<?= base_url('assets/img/novedad2.jpg') ?>" alt="novedad2">
                <h3>Novedad 2</h3>
            </div>
            <div class="enlace3">
                <img src="<?= base_url('assets/img/novedad3.jpg') ?>" alt="novedad3">
                <h3>Novedad 3</h3>
            </div>
            <div class="enlace4">
                <img src="<?= base_url('assets/img/novedad4.jpg') ?>" alt="novedad4">
                <h3>Novedad 4</h3>
            </div>
        </div>
    </section>

    <!--Formulario de login con pestañas-->
    <div id="login-modal" class="modal">
        <div class="modal-content">
            <a href="#" class="close-btn">&times;</a>

            <section class="login-section">
                <h2>Login</h2>
                <input type="radio" id="login-tab" name="tab" checked>
                <label for="login-tab" class="tab-label">Login</label>
                <input type="radio" id="register-tab" name="tab">
                <label for="register-tab" class="tab-label">Register</label>

                <div class="tab-content" id="login-content">
                    <form>
                        <input type="text" placeholder="Usuario" required>
                        <input type="password" placeholder="Contraseña" required>
                        <button type="submit">Iniciar Sesión</button>
                    </form>
                </div>

                <div class="tab-content" id="register-content">
                    <form>
                        <input type="text" placeholder="Usuario" required>
                        <input type="email" placeholder="Email" required>
                        <input type="password" placeholder="Contraseña" required>
                        <button type="submit">Registrarse</button>
                    </form>
                </div>
            </section>
        </div>
    </div>


    <footer>
        <p>Autor: Borja Morón</p>
        <p>Contacto: <a href="mailto:borja...@example.com">borja...@example.com</a></p>
</body>

</html>