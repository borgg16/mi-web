<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $titulo ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= base_url('assets/css/pagina-principal.css') ?>">
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
                    <li><a href="<?= site_url('Mi_web/percusion') ?>" class="<?= (isset($categoria_actual) && $categoria_actual == 'percusion') ? 'active' : ''?>">Percusión</a></li>
                    <li><a href="<?= site_url('Mi_web/viento') ?>" class="<?= (isset($categoria_actual) && $categoria_actual == 'viento') ? 'active' : ''?>">Viento</a></li>
                    <li><a href="<?= site_url('Mi_web/accesorios') ?>" class="<?= (isset($categoria_actual) && $categoria_actual == 'accesorios') ? 'active' : ''?>">Accesorios</a></li>
                    <li><a href="<?= site_url('Mi_web/contacto') ?>" class="<?= (isset($categoria_actual) && $categoria_actual == 'contacto') ? 'active' : ''?>">Contacto</a></li>
                </ul>
            </nav>
            <div class="user-actions">
                <a href="#login-modal" class="btn-action">Login</a>
                <a href="#basket-modal" class="btn-action">Cesta</a>
            </div>
        </div>
    </header>

    <main>
        <section class="container">
            <h1><?= $titulo ?></h1>
            <br>
            <?php if(empty($productos)): ?>
                <p>No hay productos en esta categoría.</p>
            <?php else: ?>
                <div class="enlaces" style="display:flex; flex-wrap:wrap; gap:20px;">
                    <?php foreach($productos as $prod): ?>
                        <div class="card">
                            <a href="<?= site_url('Mi_web/ver_producto/' . $prod['id']) ?>" class="link-detalle">
                            <img src="<?= base_url('assets/img/'.$prod['imagen']) ?>" alt="<?= $prod['nombre'] ?>">
                            <h3><?= $prod['nombre'] ?></h3>
                            <p><?= $prod['precio'] ?> €</p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
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
                </div>
            </section>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Borja Morón. Todos los derechos reservados.</p>
    </footer>
</body>
</html>