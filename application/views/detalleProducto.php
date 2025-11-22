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
            <div style="margin-left: auto;">
                <a href="<?= base_url() ?>" class="btn-action">VOLVER A INICIO</a>
            </div>
        </div>
    </header>

    <main>
        <div class="detalle-container">
            
            <div class="imagen-grande">
                <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" 
                     alt="<?= $producto['nombre'] ?>">
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
    
    <footer>
        <p>&copy; 2025 Borja Morón. Todos los derechos reservados.</p>
    </footer>
</body>
</html>