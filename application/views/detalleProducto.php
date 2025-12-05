<!DOCTYPE html>
<html lang="es">

<head>
    <title><?= $titulo ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/css/pagina-principal.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/detalle-producto.css') ?>">
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

                <?php if ($this->session->userdata('logged_in')): ?>
                    <a href="<?= site_url('Carrito') ?>" class="btn-action">Cesta</a>
                <?php else: ?>
                    <a href="#login-modal" class="btn-action">Cesta</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main>
        <div class="detalle-container">

            <div class="imagen-grande">
                <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" alt="<?= $producto['nombre'] ?>">
            </div>

            <div class="info-detalle">
                <h1><?= $producto['nombre'] ?></h1>
                <span class="precio-grande"><?= number_format($producto['precio'], 2) ?> €</span>
                <p class="descripcion"><?= $producto['descripcion'] ?></p>

                <?php if ($this->session->userdata('logged_in')): ?>

                    <form action="<?= site_url('Carrito/agregar') ?>" method="post">

                        <input type="hidden" name="producto_id" value="<?= $producto['id'] ?>">

                        <div style="margin: 20px 0;">
                            <label for="cant">Cantidad:</label>
                            <input type="number" name="cantidad" value="1" min="1" max="10"
                                style="width: 50px; padding: 5px; text-align: center;">
                        </div>

                        <button type="submit" class="btn-comprar">Añadir a la Cesta</button>
                    </form>

                <?php else: ?>
                    <p style="color: red; font-weight: bold;">Inicia sesión para poder comprar</p>
                <?php endif; ?>
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