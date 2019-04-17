<%@page import="cl.transbank.webpay.configuration.Configuration"%>
<%@page import="cl.transbank.webpay.WebpayNormal"%>
<%@page import="cl.transbank.webpay.Webpay"%>
<%@page import="com.transbank.webpay.wswebpay.service.WsTransactionDetailOutput"%>
<%@page import="com.transbank.webpay.wswebpay.service.TransactionResultOutput"%>
<%
    // Seteo inicial de variables
    String msg = "";

    // Creacion Transcaccion
    WebpayNormal transaction = new Webpay(Configuration.forTestingWebpayPlusNormal()).getNormalTransaction();

    // Retorno de Token
    String tokenWs = request.getParameter("token_ws");

    // Resultado de Transaccion
    TransactionResultOutput result = transaction.getTransactionResult(request.getParameter("token_ws"));

    // Detalle de Salida
    WsTransactionDetailOutput output = result.getDetailOutput().get(0);
    
    if (output.getResponseCode() == 0) {
        msg = "Transacción realziada exitosamente";
    } else {
        msg = "Error al realizar la transacción";
    }

    // Seteo de URL de Redireccion para ver Comprobante
    String redir = result.getUrlRedirection();

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
        <form class="form-signin" method="post" action="<%=redir%>">

            <input type="hidden" name="token_ws" value="<%=tokenWs%>">

            <img class="mb-4" src="https://www.transbankdevelopers.cl/public/library/img/img_webpay.png" alt="Webpay" width="300px">
            <h4 class="h5 mb-3 font-weight-normal"><%=msg%></h4>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Ver Comprobante</button>
            <p class="mt-5 mb-3 text-muted">https://www.transbankdevelopers.cl</p>
        </form>

    </body>
</html>
