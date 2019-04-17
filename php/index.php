<?php
// Importacion SDK Transbanck
require_once('sdk/init.php');
require_once('app/init.php');

// Librerias Requeridas
use Transbank\Webpay\Configuration;
use Transbank\Webpay\Webpay;

// Inicializacion Objeto General de configuracion
$webpay = new WebpayModel();
$webpaycontroller = new WebpayController();
$webpay = $webpaycontroller->init($webpay);

// Inicializacion de Transaccion
$transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))->getNormalTransaction();

// Seteo de Valores de transaccion y de retorno
$initResult = $transaction->initTransaction($webpay->getAmount(), $webpay->getBuyorder(), $webpay->getSesion(), $webpay->getUrl_return(), $webpay->getUrl_final());

// Respuesta de formulario
$webpay->setFormaction($initResult->url);
$webpay->setTokenws($initResult->token);
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Test Webpay PHP</title>
        <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/app.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-signin" action="<?php echo $webpay->getFormaction(); ?>" method="post">

            <input type="hidden" name="token_ws" value="<?php echo $webpay->getTokenws(); ?>">

            <img class="mb-4" src="https://www.transbankdevelopers.cl/public/library/img/img_webpay.png" alt="Webpay" width="300px">
            <h1 class="h5 mb-3 font-weight-normal">Testing Webpay [SDK PHP]</h1>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Pagar $<?php echo $webpay->getAmount(); ?></button>
            <p class="mt-5 mb-3 text-muted">https://www.transbankdevelopers.cl</p>
        </form>

    </body>
</html>