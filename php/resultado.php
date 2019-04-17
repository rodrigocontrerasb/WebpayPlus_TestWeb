<?php
// Importacion SDK Transbanck
require_once('sdk/init.php');
require_once('app/init.php');

$webpay = new WebpayModel();
$webpay->setSalida_id(false);
$webpay->setSalida_msg("Acceso no autorizado");

// Librerias Requeridas
use Transbank\Webpay\Configuration;
use Transbank\Webpay\Webpay;

// Inicializacion de Transaccion
$transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))->getNormalTransaction();

// Captura de token entregado via post
if (isset($_POST['token_ws'])) {

    // Obtiene token de respuesta
    $webpay->setTokenws($_POST['token_ws']);

    // Resultado de transaccion
    $result = $transaction->getTransactionResult($webpay->getTokenws());

    // Salida de resultado transaccion
    $output = $result->detailOutput;

    // Pagina de Comprobante
    $webpay->setUrl_return($result->urlRedirection);

    // Verificacion de Respuesta
    if ($output->responseCode == 0) {

        $webpay->setSalida_id(true);
        $webpay->setSalida_msg("Transacción realizada exitosamente");
    } else {

        $webpay->setSalida_id(false);
        $webpay->setSalida_msg("Error al realizar la transacción");
    }
}
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
        <form class="form-signin" method="post" action="<?php echo $webpay->getUrl_return(); ?>">

            <input type="hidden" name="token_ws" value="<?php echo $webpay->getTokenws(); ?>">

            <img class="mb-4" src="https://www.transbankdevelopers.cl/public/library/img/img_webpay.png" alt="Webpay" width="300px">
            <h4 class="h5 mb-3 font-weight-normal"><?php echo $webpay->getSalida_msg(); ?></h4>

            <?php
            if ($webpay->getSalida_id() == true) {
                ?><button class="btn btn-lg btn-primary btn-block" type="submit">Ver Comprobante</button><?php
            }
            ?>

            <p class="mt-5 mb-3 text-muted">https://www.transbankdevelopers.cl</p>
        </form>

    </body>
</html>