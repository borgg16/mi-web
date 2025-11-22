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
                    <li><a href="<?= site_url('Mi_web/percusion') ?>">Percusión</a></li>
                    <li><a href="<?= site_url('Mi_web/viento') ?>">Viento</a></li>
                    <li><a href="<?= site_url('Mi_web/accesorio') ?>">Accesorios</a></li>
                    <li><a href="<?= site_url('Mi_web/contacto') ?>">Contacto</a></li>
                </ul>
            </nav>
            <div class="user-actions">
                <a href="#login-modal" class="btn-action">Login</a>
                <a href="#basket-modal" class="btn-action">Cesta</a>
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
                
                <span class="precio-grande"><?= number_format($producto['precio'], 2, ',', '.') ?> €</span>
                
                <p class="descripcion">
                    <?= $producto['descripcion'] ?>
                </p>

                <div class="acciones">
                    <a href="#" class="btn-comprar">Añadir a la Cesta</a>
                    <br><br>
                    <a href="<?= site_url('Mi_web') ?>" style="color:#999; text-decoration:none;">&larr; Volver al catálogo</a>
                </div>
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