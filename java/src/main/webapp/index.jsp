<%@page import="com.transbank.webpay.wswebpay.service.WsInitTransactionOutput"%>
<%@page import="java.util.Random"%>
<%@page import="cl.transbank.webpay.configuration.Configuration"%>
<%@page import="cl.transbank.webpay.Webpay"%>
<%@page import="cl.transbank.webpay.WebpayNormal"%>
<%

    // Variables Generales de sitio web
    double amount = 1000;
    String site = "http://localhost:8084/test_webpay_maven/";
    String returnUrl = site + "resultado.jsp";
    String finalUrl = site + "comprobante.jsp";

    // Identificador que será retornado en el callback de resultado:
    String sessionId = "1234567890";

    // Inicializacion de Transaccion
    WebpayNormal transaction = new Webpay(Configuration.forTestingWebpayPlusNormal()).getNormalTransaction();

    // Identificador único de orden de compra
    String buyOrder = String.valueOf(Math.abs(new Random().nextLong()));

    // Ejecucion de transaccion
    WsInitTransactionOutput initResult = transaction.initTransaction(amount, sessionId, buyOrder, returnUrl, finalUrl);

    // Seteo de parametros para formulario
    String formAction = initResult.getUrl();
    String tokenWs = initResult.getToken();

%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Test Webpay Java</title>
        <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/app.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-signin" action="<%=formAction%>" method="post">

            <input type="hidden" name="token_ws" value="<%=tokenWs%>">

            <img class="mb-4" src="https://www.transbankdevelopers.cl/public/library/img/img_webpay.png" alt="Webpay" width="300px">
            <h1 class="h5 mb-3 font-weight-normal">Testing Webpay [SDK Java]</h1>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Pagar $<%=amount%></button>
            <p class="mt-5 mb-3 text-muted">https://www.transbankdevelopers.cl</p>
        </form>

    </body>
</html>
