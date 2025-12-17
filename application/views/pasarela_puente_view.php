<html>
<!--Equivale al codigo de callumapal.php-->
<head>
    <title>Conectando...</title>
</head>
<body onload="document.umapal.submit()">

    <div style="text-align: center; margin-top: 100px;">
        <h3>Conectando con la Pasarela de Pago Segura...</h3>
        <p>Por favor, espere.</p>
        <img src="<?= base_url('assets/img/loading.gif') ?>" alt="Cargando" width="50">
    </div>

    <form name="umapal" action="<?= base_url('umapal/procesar.php') ?>" method="post">
        
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="tienda@musica.com">
        <input type="hidden" name="item_name" value="Pedido Web">
        <input type="hidden" name="currency_code" value="EUR">
        
        <input type="hidden" name="amount" value="<?= $total ?>">
        <input type="hidden" name="address1" value="<?= $direccion ?>">
        <input type="hidden" name="city" value="<?= $ciudad ?>">
        <input type="hidden" name="zip" value="<?= $codigopostal ?>">
        <input type="hidden" name="country" value="ES">

        <input type="hidden" name="return" value="<?= site_url('Pasarela/pago_correcto') ?>">
        <input type="hidden" name="cancel_return" value="<?= site_url('Pasarela/pago_cancelado') ?>">
        
        <input type="hidden" name="cartID" value="<?= $PeticionActual ?>">

    </form>
</body>
</html>