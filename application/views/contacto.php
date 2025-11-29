<?php
$mensaje_enviado = false;
$errores = [];

// Detectamos si el usuario ha pulsado el botón "Enviar"
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos los datos (esto lo usaremos más adelante para la base de datos)
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $asunto = isset($_POST['asunto']) ? trim($_POST['asunto']) : '';
    $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

    // Validación básica (para que veas cómo se hace)
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no es válido.";
    }
    if (empty($mensaje)) {
        $errores[] = "Debes escribir un mensaje.";
    }

    // Si no hay errores, simulamos el envío
    if (empty($errores)) {
        $mensaje_enviado = true;
        // AQUÍ IRÍA EL CÓDIGO PARA GUARDAR EN BASE DE DATOS (PENDIENTE)
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Contacto | Instrumentos MG</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/pagina-principal.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/contacto.css') ?>">
</head>

<body>
    <header>
        <div class="header-content">
            <div class="logo-container">
                <a href="<?= base_url() ?>">
                    <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logotipo MG" class="logo-img">
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="<?= base_url() ?>">Inicio</a></li>
                    <li><a href="<?= site_url('Mi_web/percusion') ?>"
                            class="<?= (isset($categoria_actual) && $categoria_actual == 'percusion') ? 'active' : '' ?>">Percusión</a>
                    </li>
                    <li><a href="<?= site_url('Mi_web/viento') ?>"
                            class="<?= (isset($categoria_actual) && $categoria_actual == 'viento') ? 'active' : '' ?>">Viento</a>
                    </li>
                    <li><a href="<?= site_url('Mi_web/accesorios') ?>"
                            class="<?= (isset($categoria_actual) && $categoria_actual == 'accesorios') ? 'active' : '' ?>">Accesorios</a>
                    </li>
                    <li><a href="<?= site_url('Mi_web/contacto') ?>"
                            class="<?= (isset($categoria_actual) && $categoria_actual == 'contacto') ? 'active' : '' ?>">Contacto</a>
                    </li>
                </ul>
            </nav>
            <div class="user-actions">

                <?php if ($this->session->userdata('logged_in')): ?>
                    <!-- SI ESTÁ LOGUEADO: Mostramos saludo y botón Salir -->
                    <span style="font-size: 14px; margin-right:10px;">Hola,
                        <?= $this->session->userdata('usuario') ?></span>
                    <a href="<?= site_url('Auth/logout') ?>" class="btn-action btn-logout">Salir</a>

                <?php else: ?>
                    <!-- SI NO ESTÁ LOGUEADO: Mostramos botón Login -->
                    <a href="#login-modal" class="btn-action">Login</a>

                <?php endif; ?>

                <a href="#basket-modal" class="btn-action">Cesta</a>
            </div>
        </div>
    </header>

    <main>
        <section class="hero-text" style="position: relative; color: #333; height: auto; margin-top: 40px; transform: none; top: auto; left: auto; text-shadow: none;">
            <h2 class="section-title">Contacta con Nosotros</h2>
            <p style="text-align: center; max-width: 600px; margin: 0 auto; color: #666;">
                ¿Tienes dudas sobre algún instrumento? Escríbenos y te asesoraremos.
            </p>
        </section>

        <div class="contact-container">
            
            <div class="contact-info">
                <h3>Nuestra Tienda</h3>
                
                <div class="info-item">
                    <strong>Dirección</strong>
                    Calle de la Música, 123<br>
                    28000, Madrid
                </div>

                <div class="info-item">
                    <strong>Teléfono</strong>
                    +34 91 123 45 67
                </div>

                <div class="info-item">
                    <strong>Email</strong>
                    info@instrumentosmg.com
                </div>

                <div class="info-item">
                    <strong>Horario</strong>
                    Lunes - Viernes: 10:00 - 14:00 / 17:00 - 20:30<br>
                    Sábados: 10:00 - 14:00
                </div>
            </div>

            <div class="contact-form-wrapper">
                
                <?php if ($mensaje_enviado): ?>
                    <div class="alert alert-success">
                        ¡Gracias! Tu mensaje se ha enviado correctamente. Te contactaremos pronto.
                    </div>
                <?php endif; ?>

                <?php if (!empty($errores)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errores as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" placeholder="tucorreo@ejemplo.com" required>
                    </div>

                    <div class="form-group">
                        <label for="asunto">Asunto</label>
                        <input type="text" id="asunto" name="asunto" placeholder="¿Sobre qué quieres hablar?">
                    </div>

                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" placeholder="Escribe aquí tu consulta..." required></textarea>
                    </div>

                    <button type="submit" class="btn-action" style="width: 100%; padding: 12px; font-size: 16px;">Enviar Mensaje</button>
                </form>
            </div>
        </div>

        

    </main>

    <div id="login-modal" class="modal">
        <div class="modal-content">
            <a href="#" class="close-btn">&times;</a>
            <section class="login-section">
                <h2>Acceso Usuario</h2>
                <div class="tabs">
                    <input type="radio" id="login-tab" name="tab" checked>
                    <label for="login-tab" class="tab-label">Entrar</label>

                    <input type="radio" id="register-tab" name="tab">
                    <label for="register-tab" class="tab-label">Registro</label>

                    <!-- PARTE DEL LOGIN -->
                    <div class="tab-content" id="login-content">
                        <!-- Action: Apunta al Controlador Auth, función login -->
                        <form action="<?= site_url('Auth/login') ?>" method="post">
                            <!-- Name: Es vital para que el controlador pueda leerlo -->
                            <input type="text" name="usuario" placeholder="Usuario" required>
                            <input type="password" name="password" placeholder="Contraseña" required>
                            <button type="submit">Iniciar Sesión</button>
                        </form>
                    </div>

                    <!-- PARTE DEL REGISTRO -->
                    <div class="tab-content" id="register-content">
                        <!-- Action: Apunta al Controlador Auth, función registrar -->
                        <form action="<?= site_url('Auth/registrar') ?>" method="post">
                            <input type="text" name="usuario" placeholder="Usuario" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="password" placeholder="Contraseña" required>
                            <button type="submit">Registrarse</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
    <footer>
        <p>&copy; 2025 Borja Morón. Todos los derechos reservados.</p>
    </footer>

</body>
</html>