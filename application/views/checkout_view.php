<!DOCTYPE html>
<!--Equivale al codigo de myform.php-->
<html lang="es">
<head>
    <title>Datos de Envío</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/pagina-principal.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/contacto.css') ?>">
</head>
<body>
    <header>
        <div class="header-content">
            <a href="<?= base_url() ?>"><h1>TIENDA DE MÚSICA</h1></a>
        </div>
    </header>

    <main class="container">
        <h2>Paso Final: Datos de Envío</h2>

        <?php echo validation_errors('<div class="alert alert-danger" style="color:red; margin-bottom:15px;">', '</div>'); ?>

        <?php echo form_open('Pasarela/index'); ?>

        <div class="contact-form-wrapper" style="max-width: 600px; margin: 0 auto;">
            
            <div class="form-group">
                <label>Dirección completa:</label>
                <input type="text" name="direccion" value="<?php echo set_value('direccion'); ?>" />
            </div>

            <div class="form-group">
                <label>Código Postal (5 dígitos):</label>
                <input type="text" name="codigopostal" value="<?php echo set_value('codigopostal'); ?>" />
            </div>

            <div class="form-group">
                <label>Ciudad:</label>
                <input type="text" name="ciudad" value="<?php echo set_value('ciudad'); ?>" />
            </div>

            <div class="form-group">
                <label>Teléfono:</label>
                <input type="text" name="telefono" value="<?php echo set_value('telefono'); ?>" />
            </div>

            <button type="submit" class="btn-action" style="width: 100%; margin-top: 20px;">
                Ir al Pago &rarr;
                <!--$rarr; equivale a la flechita en unicode -->
            </button>
        </div>

        </form>
    </main>
</body>
</html>