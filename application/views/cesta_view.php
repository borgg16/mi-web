<!DOCTYPE html>
<html lang="es">
<head>
    <title>Tu Cesta</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/pagina-principal.css') ?>">
    <style>
        .tabla-cesta { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .tabla-cesta th, .tabla-cesta td { border-bottom: 1px solid #ddd; padding: 15px; text-align: left; }
        .btn-borrar { color: red; text-decoration: none; font-weight: bold; }
        .btn-pagar { background: #28a745; color: white; padding: 15px 30px; text-decoration: none; display: inline-block; margin-top: 20px; border-radius: 5px; }
    </style>
</head>
<body>
    
    <header>
        <div class="header-content">
            <a href="<?= base_url() ?>"><h1>VOLVER A LA TIENDA</h1></a>
        </div>
    </header>

    <main class="container">
        <h2>Resumen de tu pedido</h2>

        <?php if(empty($items)): ?>
            <p>Tu cesta está vacía.</p>
        <?php else: ?>
            
            <table class="tabla-cesta">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cant.</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($items as $item): ?>
                    <tr>
                        <td><?= $item->nombre ?></td>
                        <td><?= $item->precio ?> €</td>
                        <td><?= $item->cantidad ?></td>
                        <td><?= number_format($item->precio * $item->cantidad, 2) ?> €</td>
                        <td>
                            <a href="<?= site_url('Carrito/borrar/' . $item->id_cesta) ?>" class="btn-borrar">X Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div style="text-align: right; margin-top: 30px;">
                <h3>Total a Pagar: <?= number_format($total, 2) ?> €</h3>
                
                <a href="<?= site_url('Carrito/finalizar_compra') ?>" class="btn-pagar">Finalizar Compra</a>
            </div>

        <?php endif; ?>
    </main>

</body>
</html>