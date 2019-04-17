<?php
// Liberia de config
require_once('app/init.php');

// inicializacion objeto webpay
$webpay = new WebpayModel();

// Obtener retorno
if (isset($_POST)) {
    $webpay->setSalida_msg($_POST['token_ws']);
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
        <form class="form-signin">
            <img class="mb-4" src="https://www.transbankdevelopers.cl/public/library/img/img_webpay.png" alt="Webpay" width="300px">
            <h4 class="h6 mb-3 font-weight-normal">Token</h4>
            <h4 class="h6 mb-3 font-weight-normal"><?php echo $webpay->getSalida_msg(); ?></h4>
            <p class="mt-5 mb-3 text-muted">https://www.transbankdevelopers.cl</p>
        </form>

    </body>
</html>