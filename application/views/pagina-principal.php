<!DOCTYPE html>
<html lang="es">

<head>
    <title><?= $titulo; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta autor="Borja Morón">
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
        <section class="hero-section">
            <div class="novedades">
                <div class="novedad active"> <img src="<?= base_url('assets/img/novedad1.jpg') ?>" alt="novedad1">
                </div>
                <div class="novedad">
                    <img src="<?= base_url('assets/img/novedad2.jpg') ?>" alt="novedad2">
                </div>
                <div class="novedad">
                    <img src="<?= base_url('assets/img/novedad3.jpg') ?>" alt="novedad3">
                </div>
                <div class="novedad">
                    <img src="<?= base_url('assets/img/novedad4.jpg') ?>" alt="novedad4">
                </div>
            </div>
            <div class="hero-text">
                <h2>Nuevas Tendencias</h2>
            </div>
        </section>

        <section class="container">
            <h2 class="section-title">Productos Destacados</h2>
            <div class="enlaces">
                <div class="card">
                    <a href="<?= site_url('Mi_web/ver_producto/'. $producto_home1['id'])?>" style="text-decoration: none; color: inherit;">
                    <img src="<?= base_url('assets/img/'.$producto_home1['imagen']) ?>" alt="<?= $producto_home1['nombre'] ?>">
                    <h3><?= $producto_home1['nombre'] ?></h3>
                    </a>
                </div>
                <div class="card">
                    <a href="<?= site_url('Mi_web/ver_producto/'. $producto_home2['id'])?>" style="text-decoration: none; color: inherit;">
                    <img src="<?= base_url('assets/img/'.$producto_home2['imagen']) ?>" alt="<?= $producto_home2['nombre'] ?>">
                    <h3><?= $producto_home2['nombre'] ?></h3>
                    </a>
                </div>
                <div class="card">
                    <a href="<?= site_url('Mi_web/ver_producto/'. $producto_home3['id'])?>" style="text-decoration: none; color: inherit;">
                    <img src="<?= base_url('assets/img/'.$producto_home3['imagen']) ?>" alt="<?= $producto_home3['nombre'] ?>">
                    <h3><?= $producto_home3['nombre'] ?></h3>
                    </a>
                </div>
                <div class="card">
                    <a href="<?= site_url('Mi_web/ver_producto/'. $producto_home4['id'])?>" style="text-decoration: none; color: inherit;">
                    <img src="<?= base_url('assets/img/'.$producto_home4['imagen']) ?>" alt="<?= $producto_home4['nombre'] ?>">
                    <h3><?= $producto_home4['nombre'] ?></h3>
                    </a>
                </div>
            </div>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const slides = document.querySelectorAll('.novedades .novedad');
            let indiceActual = 0;
            const tiempoIntervalo = 4000;

            if (slides.length > 0) {
                setInterval(() => {
                    slides[indiceActual].classList.remove('active');
                    indiceActual = (indiceActual + 1) % slides.length;
                    slides[indiceActual].classList.add('active');
                }, tiempoIntervalo);
            }
        });
    </script>
</body>

</html>